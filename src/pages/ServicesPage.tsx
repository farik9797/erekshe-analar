import React from 'react';
import { ServicesSection } from '../components/ServicesSection';
import { RehabProcess } from '../components/RehabProcess';
import { useAccessibility } from '../context/AccessibilityContext';
import { FadeIn } from '../components/FadeIn';
import { Sparkles, Activity, CheckCircle2, HeartHandshake } from 'lucide-react';

export const ServicesPage: React.FC = () => {
  const { lang, t, openEnrollModal } = useAccessibility();

  return (
    <div className="bg-slate-50 min-h-screen py-10 space-y-12">
      {/* Banner */}
      <FadeIn>
        <div className="max-w-7xl mx-auto px-4">
          <div className="bg-gradient-to-br from-teal-800 via-emerald-800 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl relative overflow-hidden">
            <div className="relative z-10 max-w-3xl">
              <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
                <Activity className="w-4 h-4" />
                {lang === 'ru' ? 'Каталог коррекционных и медицинских услуг' : 'Түзету және медициналық қызметтер каталогы'}
              </span>
              <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4">
                {t.servicesTitle}
              </h1>
              <p className="text-slate-200 text-base md:text-lg leading-relaxed mb-6">
                {t.servicesDesc}
              </p>
              <button
                onClick={() => openEnrollModal()}
                className="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-emerald-500/30 flex items-center gap-2 cursor-pointer"
              >
                <Sparkles className="w-4 h-4" />
                <span>{t.btnEnroll}</span>
              </button>
            </div>
          </div>
        </div>
      </FadeIn>

      {/* Main Interactive Services Catalogue Component */}
      <FadeIn>
        <ServicesSection />
      </FadeIn>

      {/* Process / Step-by-Step Route */}
      <FadeIn>
        <RehabProcess />
      </FadeIn>
    </div>
  );
};
