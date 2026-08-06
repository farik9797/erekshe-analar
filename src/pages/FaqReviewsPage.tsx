import React from 'react';
import { ReviewsSection } from '../components/ReviewsSection';
import { FaqSection } from '../components/FaqSection';
import { useAccessibility } from '../context/AccessibilityContext';
import { FadeIn } from '../components/FadeIn';
import { MessageSquare, HelpCircle, Sparkles } from 'lucide-react';

export const FaqReviewsPage: React.FC = () => {
  const { lang, t, openEnrollModal } = useAccessibility();

  return (
    <div className="bg-slate-50 min-h-screen py-10 space-y-12">
      <FadeIn>
        <div className="max-w-7xl mx-auto px-4">
          <div className="bg-gradient-to-r from-teal-900 via-emerald-900 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl">
            <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
              <MessageSquare className="w-4 h-4" />
              {lang === 'ru' ? 'Отзывы родителей и частые вопросы' : 'Ата-аналар пікірлері мен жиі қойылатын сұрақтар'}
            </span>
            <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4">
              {t.reviewsTitle} & {t.faqTitle}
            </h1>
            <p className="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6">
              {t.reviewsDesc}
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
      </FadeIn>

      <FadeIn>
        <ReviewsSection />
      </FadeIn>
      <FadeIn>
        <FaqSection />
      </FadeIn>
    </div>
  );
};
