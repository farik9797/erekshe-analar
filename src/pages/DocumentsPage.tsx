import React from 'react';
import { DocumentsSection } from '../components/DocumentsSection';
import { PartnersSection } from '../components/PartnersSection';
import { useAccessibility } from '../context/AccessibilityContext';
import { FadeIn } from '../components/FadeIn';
import { FileCheck, ShieldCheck } from 'lucide-react';

export const DocumentsPage: React.FC = () => {
  const { lang, t } = useAccessibility();

  return (
    <div className="bg-slate-50 min-h-screen py-10 space-y-12">
      <FadeIn>
        <div className="max-w-7xl mx-auto px-4">
          <div className="bg-gradient-to-r from-slate-900 via-emerald-950 to-slate-900 text-white rounded-3xl p-4 sm:p-8 md:p-12 shadow-xl">
            <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
              <ShieldCheck className="w-4 h-4" />
              {t.documentsBadge}
            </span>
            <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4">
              {t.documentsTitle}
            </h1>
            <p className="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl">
              {t.documentsDesc}
            </p>
          </div>
        </div>
      </FadeIn>

      <FadeIn>
        <DocumentsSection />
      </FadeIn>
      <FadeIn>
        <PartnersSection />
      </FadeIn>
    </div>
  );
};
