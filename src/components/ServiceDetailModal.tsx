import React, { useEffect, useRef } from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { X, Clock, Users, MapPin, Award } from 'lucide-react';

export const ServiceDetailModal: React.FC = () => {
  const {
    lang,
    t,
    selectedServiceForModal,
    closeServiceModal,
    hideImages
  } = useAccessibility();

  // Закрытие по Esc
  useEffect(() => {
    if (!selectedServiceForModal) return;
    const onKey = (e: KeyboardEvent) => { if (e.key === 'Escape') closeServiceModal(); };
    document.addEventListener('keydown', onKey);
    return () => document.removeEventListener('keydown', onKey);
  }, [selectedServiceForModal, closeServiceModal]);

  // Клик по фону закрывает — только если и нажали на фоне
  const downOnBackdrop = useRef(false);

  if (!selectedServiceForModal) return null;

  const service = selectedServiceForModal;

  return (
    <div
      className="fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-center justify-center p-3 sm:p-4 animate-fadeIn"
      onMouseDown={(e) => { downOnBackdrop.current = e.target === e.currentTarget; }}
      onClick={(e) => { if (downOnBackdrop.current && e.target === e.currentTarget) closeServiceModal(); }}
    >
      <div className="bg-white rounded-3xl max-w-2xl w-full max-h-[92vh] overflow-y-auto p-5 sm:p-4 shadow-2xl relative border border-slate-100">
        <button
          onClick={closeServiceModal}
          aria-label={lang === 'ru' ? 'Закрыть' : 'Жабу'}
          className="absolute top-4 right-4 z-10 p-2 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 transition cursor-pointer"
        >
          <X className="w-5 h-5" />
        </button>

        <div className="flex flex-col gap-6">
          {/* Top Banner */}
          {!hideImages && (
            <div className="relative h-72 sm:h-80 rounded-2xl overflow-hidden bg-slate-100">
              {/* Размытая подложка — фото разных пропорций, снимок не обрезаем */}
              <img
                src={service.image}
                alt=""
                aria-hidden="true"
                className="absolute inset-0 w-full h-full object-cover scale-110 blur-xl opacity-50"
              />
              <img
                src={service.image}
                alt={service.title[lang]}
                className="absolute inset-0 w-full h-full object-contain"
              />
            </div>
          )}

          <div>
            <div className="flex items-center gap-2 mb-2">
              <span className="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold">
                {service.targetAge[lang]}
              </span>
              <span className="flex items-center gap-1 text-xs font-semibold text-slate-500">
                <Clock className="w-3.5 h-3.5 text-emerald-600" />
                <span>{service.duration[lang]}</span>
              </span>
            </div>
            <h3 className="text-2xl font-extrabold text-slate-900">{service.title[lang]}</h3>
            <p className="text-sm text-slate-600 mt-2 leading-relaxed">{service.fullDesc[lang]}</p>
          </div>

          {/* Equipment */}
          {service.equipment && (
            <div>
              <h4 className="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                {t.svcModalEquipment}
              </h4>
              <p className="text-xs text-slate-700 bg-slate-50 p-3 rounded-xl border border-slate-100">
                {service.equipment[lang]}
              </p>
            </div>
          )}

          {/* Action CTAs */}
          <div className="pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
            <button
              onClick={closeServiceModal}
              className="px-4 py-2.5 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs hover:bg-slate-200 transition"
            >
              {t.btnClose}
            </button>

          </div>
        </div>
      </div>
    </div>
  );
};
