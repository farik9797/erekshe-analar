import React, { useState } from 'react';
import { BranchesSection } from '../components/BranchesSection';
import { useAccessibility } from '../context/AccessibilityContext';
import { FadeIn } from '../components/FadeIn';
import { MapPin, Building2, Sparkles, Navigation, ChevronDown, MessageCircle } from 'lucide-react';

export const BranchesPage: React.FC = () => {
  const { lang, t } = useAccessibility();
  const [waOpen, setWaOpen] = useState(false);

  // Методисты филиалов — заявка идёт напрямую в WhatsApp выбранного филиала
  const METHODISTS = [
    { branch: { ru: 'Аманат, 12/1', kk: 'Аманат, 12/1' }, phone: '+7 (776) 163-95-21' },
    { branch: { ru: 'Сарыарка, 48', kk: 'Сарыарқа, 48' }, phone: '+7 (705) 140-31-34' },
    { branch: { ru: 'Акын Сара, 37', kk: 'Ақын Сара, 37' }, phone: '+7 (707) 754-55-52' },
  ];

  return (
    <div className="bg-slate-50 min-h-screen py-10 space-y-12">
      <FadeIn>
        <div className="max-w-7xl mx-auto px-4">
          <div className="bg-gradient-to-r from-emerald-800 via-teal-800 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl">
            <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
              <MapPin className="w-4 h-4" />
              {t.astanaCity} (4 {lang === 'ru' ? 'филиала' : 'филиал'})
            </span>
            <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4">
              {t.branchesTitle}
            </h1>
            <p className="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6">
              {t.branchesDesc}
            </p>
            <div className="relative inline-block">
              <button
                type="button"
                onClick={() => setWaOpen((v) => !v)}
                aria-expanded={waOpen}
                className="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-emerald-500/30 flex items-center gap-2 cursor-pointer"
              >
                <Sparkles className="w-4 h-4" />
                <span>{t.btnEnroll}</span>
                <ChevronDown className={`w-4 h-4 transition-transform ${waOpen ? 'rotate-180' : ''}`} />
              </button>

              {waOpen && (
                <div className="absolute left-0 top-full mt-2 w-72 max-w-[85vw] bg-white rounded-2xl shadow-2xl border border-slate-200 p-2 z-20">
                  <p className="px-3 py-2 text-[11px] font-bold uppercase tracking-wider text-slate-500">
                    {lang === 'ru' ? 'Методисты филиалов' : 'Филиал әдіскерлері'}
                  </p>
                  {METHODISTS.map((m) => (
                    <a
                      key={m.phone}
                      href={`https://wa.me/${m.phone.replace(/\D/g, '')}`}
                      target="_blank"
                      rel="noopener noreferrer"
                      className="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-emerald-50 transition cursor-pointer"
                    >
                      <MessageCircle className="w-4 h-4 text-emerald-600 flex-shrink-0" />
                      <span className="flex flex-col text-left">
                        <span className="text-xs text-slate-500">{m.branch[lang]}</span>
                        <span className="text-sm font-bold text-slate-900">{m.phone}</span>
                      </span>
                    </a>
                  ))}
                </div>
              )}
            </div>
          </div>
        </div>
      </FadeIn>

      <FadeIn>
        <BranchesSection hideHeader />
      </FadeIn>
    </div>
  );
};
