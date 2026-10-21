import React, { useEffect, useRef } from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { X, HeartHandshake, ShieldCheck, Copy, Check } from 'lucide-react';

export const DonationModal: React.FC = () => {
  const { lang, t, isDonationModalOpen, closeDonationModal } = useAccessibility();
  const [copiedField, setCopiedField] = React.useState<string | null>(null);

  // Закрытие по Esc
  useEffect(() => {
    if (!isDonationModalOpen) return;
    const onKey = (e: KeyboardEvent) => { if (e.key === 'Escape') closeDonationModal(); };
    document.addEventListener('keydown', onKey);
    return () => document.removeEventListener('keydown', onKey);
  }, [isDonationModalOpen, closeDonationModal]);

  // Клик по фону закрывает — только если и нажали на фоне
  const downOnBackdrop = useRef(false);

  if (!isDonationModalOpen) return null;

  const copyToClipboard = (text: string, fieldName: string) => {
    navigator.clipboard.writeText(text);
    setCopiedField(fieldName);
    setTimeout(() => setCopiedField(null), 2000);
  };

  return (
    <div
      className="fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-center justify-center p-3 sm:p-4 animate-fadeIn"
      onMouseDown={(e) => { downOnBackdrop.current = e.target === e.currentTarget; }}
      onClick={(e) => { if (downOnBackdrop.current && e.target === e.currentTarget) closeDonationModal(); }}
    >
      <div className="bg-white rounded-3xl max-w-xl w-full max-h-[92vh] overflow-y-auto p-5 sm:p-4 shadow-2xl relative border border-slate-100">
        <button
          onClick={closeDonationModal}
          aria-label={lang === 'ru' ? 'Закрыть' : 'Жабу'}
          className="absolute top-4 right-4 z-10 p-2 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 transition cursor-pointer"
        >
          <X className="w-5 h-5" />
        </button>

        <div className="flex flex-col gap-6">
          <div>
            <div className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-100 text-amber-900 text-[11px] font-bold mb-2">
              <HeartHandshake className="w-3.5 h-3.5 text-amber-600" />
              <span>{t.charityBadge}</span>
            </div>
            <h3 className="text-xl sm:text-2xl font-extrabold text-slate-900">
              {t.donationTitle}
            </h3>
            <p className="text-xs text-slate-500 mt-1">{t.donationSubtitle}</p>
          </div>

          {/* Bank Details Table */}
          <div className="bg-slate-50 p-5 rounded-2xl border border-slate-200 flex flex-col gap-3 text-xs">
            <p className="font-bold text-slate-900 uppercase tracking-wider">{t.donationBankTitle}</p>

            <div className="flex items-center justify-between py-1.5 border-b border-slate-200">
              <span className="text-slate-500 font-medium">{t.donationOrg}</span>
              <span className="font-bold text-slate-900">{t.donationOrgName}</span>
            </div>

            <div className="flex items-center justify-between py-1.5 border-b border-slate-200">
              <span className="text-slate-500 font-medium">{lang === 'ru' ? 'БИН:' : 'БСН:'}</span>
              <div className="flex items-center gap-2">
                <span className="font-bold text-slate-900">201140026437</span>
                <button
                  onClick={() => copyToClipboard('201140026437', 'bin')}
                  aria-label={lang === 'ru' ? 'Копировать БИН' : 'БСН көшіру'}
                  className="p-1 rounded bg-white hover:bg-slate-200 text-slate-600 border border-slate-200 cursor-pointer"
                >
                  {copiedField === 'bin' ? <Check className="w-3.5 h-3.5 text-emerald-600" /> : <Copy className="w-3.5 h-3.5" />}
                </button>
              </div>
            </div>

            <div className="flex items-center justify-between py-1.5 border-b border-slate-200">
              <span className="text-slate-500 font-medium">{lang === 'ru' ? 'ИИК (KZT):' : 'ЖСК (KZT):'}</span>
              <div className="flex items-center gap-2">
                <span className="font-bold text-slate-900 font-mono text-[11px]">KZ918562203127814849</span>
                <button
                  onClick={() => copyToClipboard('KZ918562203127814849', 'iban')}
                  aria-label={lang === 'ru' ? 'Копировать ИИК' : 'ЖСК көшіру'}
                  className="p-1 rounded bg-white hover:bg-slate-200 text-slate-600 border border-slate-200 cursor-pointer"
                >
                  {copiedField === 'iban' ? <Check className="w-3.5 h-3.5 text-emerald-600" /> : <Copy className="w-3.5 h-3.5" />}
                </button>
              </div>
            </div>

            <div className="flex items-center justify-between py-1.5 border-b border-slate-200">
              <span className="text-slate-500 font-medium">Банк:</span>
              <span className="font-bold text-slate-900">{t.donationBankName}</span>
            </div>

            <div className="flex items-center justify-between py-1.5 border-b border-slate-200">
              <span className="text-slate-500 font-medium">{lang === 'ru' ? 'БИК:' : 'БСК:'}</span>
              <span className="font-bold text-slate-900 font-mono text-[11px]">KCJBKZKX</span>
            </div>

            <div className="flex items-center justify-between py-1.5">
              <span className="text-slate-500 font-medium">{lang === 'ru' ? 'КБЕ:' : 'Кбе:'}</span>
              <span className="font-bold text-slate-900">{t.donationKbe}</span>
            </div>
          </div>

          <div className="flex items-center gap-2 text-xs font-semibold text-slate-500">
            <ShieldCheck className="w-4 h-4 text-emerald-600 flex-shrink-0" />
            <span>{t.donationReports}</span>
          </div>

          <button
            onClick={closeDonationModal}
            className="w-full py-3 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs hover:bg-slate-200 transition"
          >
            {t.btnClose}
          </button>
        </div>
      </div>
    </div>
  );
};
