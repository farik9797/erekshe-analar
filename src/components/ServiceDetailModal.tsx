import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { X, Sparkles, CheckCircle2, Clock, Users, MapPin, Award } from 'lucide-react';

export const ServiceDetailModal: React.FC = () => {
  const {
    lang,
    t,
    selectedServiceForModal,
    closeServiceModal,
    openEnrollModal,
    hideImages
  } = useAccessibility();

  if (!selectedServiceForModal) return null;

  const service = selectedServiceForModal;

  return (
    <div className="fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-center justify-center p-3 sm:p-4 animate-fadeIn">
      <div className="bg-white rounded-3xl max-w-2xl w-full max-h-[92vh] overflow-y-auto p-5 sm:p-8 shadow-2xl relative border border-slate-100">
        <button
          onClick={closeServiceModal}
          className="absolute top-4 right-4 p-2 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 transition"
        >
          <X className="w-5 h-5" />
        </button>

        <div className="flex flex-col gap-6">
          {/* Top Banner */}
          {!hideImages && (
            <div className="h-56 rounded-2xl overflow-hidden bg-slate-100">
              <img
                src={service.image}
                alt={service.title[lang]}
                className="w-full h-full object-cover"
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

          {/* Indications List */}
          <div>
            <h4 className="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
              {t.serviceIndications}
            </h4>
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-2">
              {service.indications[lang].map((ind, idx) => (
                <div key={idx} className="flex items-center gap-2 bg-slate-50 p-2.5 rounded-xl border border-slate-100 text-xs font-semibold text-slate-800">
                  <CheckCircle2 className="w-4 h-4 text-emerald-600 flex-shrink-0" />
                  <span>{ind}</span>
                </div>
              ))}
            </div>
          </div>

          {/* Results Expected */}
          <div>
            <h4 className="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
              {t.serviceResults}
            </h4>
            <div className="bg-emerald-50/70 p-4 rounded-2xl border border-emerald-100 flex flex-col gap-2">
              {service.results[lang].map((res, idx) => (
                <div key={idx} className="flex items-start gap-2 text-xs font-bold text-emerald-950">
                  <Sparkles className="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" />
                  <span>{res}</span>
                </div>
              ))}
            </div>
          </div>

          {/* Equipment */}
          {service.equipment && (
            <div>
              <h4 className="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                Используемое оборудование
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

            <button
              onClick={() => {
                closeServiceModal();
                openEnrollModal('', service.id);
              }}
              className="px-6 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-md shadow-emerald-600/20"
            >
              Записаться на этот курс
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};
