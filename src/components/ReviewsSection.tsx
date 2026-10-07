import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { REVIEWS } from '../data/mockData';
import { Star, MessageCircle, Quote, Sparkles } from 'lucide-react';

export const ReviewsSection: React.FC = () => {
  const { lang, t } = useAccessibility();

  return (
    <section id="reviews" className="py-16 md:py-24 bg-slate-50 border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <Sparkles className="w-4 h-4 text-emerald-600" />
            <span>{t.reviewsBadge}</span>
          </div>
          <h2 className="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.reviewsTitle}
          </h2>
          <p className="text-slate-600 text-sm sm:text-base mt-3">
            {t.reviewsSubtitle}
          </p>
        </div>

        {/* Reviews Cards Grid */}
        <div className="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 md:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
          {REVIEWS.map((rev) => (
            <div
              key={rev.id}
              className="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-xs hover:shadow-xl transition-all flex flex-col gap-4 relative flex-shrink-0 w-[85vw] max-w-[340px] sm:w-auto sm:max-w-none snap-center sm:snap-none"
            >
              {/* Header: Name, Rating */}
              <div className="flex items-start justify-between gap-3">
                <h4 className="font-bold text-slate-900 text-sm leading-snug">{rev.parentName[lang]}</h4>
                <div className="flex items-center gap-0.5 text-amber-400 flex-shrink-0">
                  {[...Array(rev.rating)].map((_, i) => (
                    <Star key={i} className="w-4 h-4 fill-amber-400" />
                  ))}
                </div>
              </div>

              {/* Review Quote Body */}
              <p className="text-xs sm:text-sm text-slate-700 leading-relaxed italic">
                «{rev.text[lang]}»
              </p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};
