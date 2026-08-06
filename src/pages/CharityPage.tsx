import React from 'react';
import { CharitySection } from '../components/CharitySection';
import { DocumentsSection } from '../components/DocumentsSection';
import { useAccessibility } from '../context/AccessibilityContext';
import { FadeIn } from '../components/FadeIn';
import { HeartHandshake, Sparkles, ShieldCheck, Heart } from 'lucide-react';

export const CharityPage: React.FC = () => {
  const { lang, t, openDonationModal } = useAccessibility();

  return (
    <div className="bg-slate-50 min-h-screen py-10 space-y-12">
      <FadeIn>
        <div className="max-w-7xl mx-auto px-4">
          <div className="bg-gradient-to-r from-emerald-900 via-teal-900 to-slate-900 text-white rounded-3xl p-4 sm:p-8 md:p-12 shadow-xl">
            <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
              <HeartHandshake className="w-4 h-4" />
              {t.charityBadge}
            </span>
            <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4">
              {t.charityTitle}
            </h1>
            <p className="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6">
              {t.charityDesc}
            </p>
            <button
              onClick={openDonationModal}
              className="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-emerald-500/30 flex items-center gap-2 cursor-pointer"
            >
              <Heart className="w-4 h-4 fill-slate-950" />
              <span>{t.btnSupport}</span>
            </button>
          </div>
        </div>
      </FadeIn>

      <FadeIn>
        <CharitySection />
      </FadeIn>
      <FadeIn>
        <DocumentsSection />
      </FadeIn>
    </div>
  );
};
