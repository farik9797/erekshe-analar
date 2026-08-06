import React from 'react';
import { NewsSection } from '../components/NewsSection';
import { GallerySection } from '../components/GallerySection';
import { useAccessibility } from '../context/AccessibilityContext';
import { FadeIn } from '../components/FadeIn';
import { Newspaper } from 'lucide-react';

export const NewsPage: React.FC = () => {
  const { lang, t } = useAccessibility();

  return (
    <div className="bg-slate-50 min-h-screen py-10 space-y-12">
      <FadeIn>
        <div className="max-w-7xl mx-auto px-4">
          <div className="bg-gradient-to-r from-emerald-900 via-slate-900 to-teal-900 text-white rounded-3xl p-8 md:p-12 shadow-xl">
            <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
              <Newspaper className="w-4 h-4" />
              {t.newsBadge}
            </span>
            <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4">
              {t.newsTitle}
            </h1>
            <p className="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl">
              {t.newsDesc}
            </p>
          </div>
        </div>
      </FadeIn>

      <FadeIn>
        <NewsSection />
      </FadeIn>
      <FadeIn>
        <GallerySection />
      </FadeIn>
    </div>
  );
};
