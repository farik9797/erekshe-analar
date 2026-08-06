import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { PARTNERS } from '../data/mockData';
import { Building2 } from 'lucide-react';

export const PartnersSection: React.FC = () => {
  const { lang, t } = useAccessibility();

  return (
    <section className="py-16 md:py-20 bg-slate-50 border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-2xl mx-auto mb-12">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <Building2 className="w-4 h-4 text-emerald-600" />
            <span>{t.partnersBadge}</span>
          </div>
          <h2 className="text-[1.2rem] sm:text-3xl font-extrabold text-slate-900 tracking-tight">
            {t.partnersTitle}
          </h2>
        </div>

        {/* Partners Cards */}
        <div className="grid grid-cols-2 md:grid-cols-4 gap-6">
          {PARTNERS.map((partner, idx) => (
            <div
              key={idx}
              className="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs hover:border-emerald-300 transition flex flex-col items-center text-center justify-center gap-2"
            >
              <div className="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 font-extrabold text-xs flex items-center justify-center tracking-tight uppercase">
                {partner.logoText.slice(0, 6)}
              </div>
              <h4 className="font-bold text-slate-900 text-xs sm:text-sm mt-2">{partner.name}</h4>
              <p className="text-[11px] text-slate-500 font-medium">{partner.desc[lang]}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};
