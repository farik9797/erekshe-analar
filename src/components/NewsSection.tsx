import React, { useState } from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { NEWS } from '../data/mockData';
import { NewsItem } from '../types';
import { Newspaper, Calendar, ArrowRight, X, Sparkles } from 'lucide-react';

export const NewsSection: React.FC = () => {
  const { lang, t, hideImages } = useAccessibility();
  const [activeCategory, setActiveCategory] = useState<string>('all');
  const [selectedNewsModal, setSelectedNewsModal] = useState<NewsItem | null>(null);

  const categories = [
    { id: 'all', label: t.filterNewsAll },
    { id: 'announcement', label: t.filterNewsAnnounce },
    { id: 'charity', label: t.filterNewsCharity },
    { id: 'holiday', label: t.filterNewsHolidays }
  ];

  const filteredNews = activeCategory === 'all'
    ? NEWS
    : NEWS.filter((n) => n.category === activeCategory);

  return (
    <section id="news" className="py-16 md:py-24 bg-slate-50 border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-12">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <Newspaper className="w-4 h-4 text-emerald-600" />
            <span>{t.newsBadge}</span>
          </div>
          <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.newsTitle}
          </h2>
        </div>

        {/* Category Filters */}
        <div className="flex flex-wrap items-center justify-center gap-2 mb-10">
          {categories.map((cat) => (
            <button
              key={cat.id}
              onClick={() => setActiveCategory(cat.id)}
              className={`px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition ${
                activeCategory === cat.id
                  ? 'bg-emerald-600 text-white shadow-md'
                  : 'bg-white text-slate-700 border border-slate-200'
              }`}
            >
              {cat.label}
            </button>
          ))}
        </div>

        {/* News Grid */}
        <div className="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 md:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
          {filteredNews.map((news) => (
            <div
              key={news.id}
              className="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl transition-all overflow-hidden flex flex-col justify-between group flex-shrink-0 w-[85vw] max-w-[340px] sm:w-auto sm:max-w-none snap-center sm:snap-none"
            >
              <div className="relative h-48 bg-slate-100">
                {!hideImages ? (
                  <img
                    src={news.image}
                    alt={news.title[lang]}
                    className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                  />
                ) : (
                  <div className="w-full h-full bg-emerald-800 text-white flex items-center justify-center p-4">
                    <span className="font-bold text-center">{news.title[lang]}</span>
                  </div>
                )}
                {news.badge && (
                  <div className="absolute top-3 left-3 bg-emerald-600 text-white px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider shadow-sm">
                    {news.badge[lang]}
                  </div>
                )}
              </div>

              <div className="p-6 flex-1 flex flex-col justify-between gap-4">
                <div>
                  <div className="flex items-center gap-1.5 text-slate-400 text-xs font-semibold mb-2">
                    <Calendar className="w-3.5 h-3.5 text-emerald-600" />
                    <span>{news.date}</span>
                  </div>
                  <h3 className="text-base font-bold text-slate-900 group-hover:text-emerald-700 transition-colors leading-snug">
                    {news.title[lang]}
                  </h3>
                  <p className="text-xs text-slate-600 mt-2 line-clamp-3 leading-relaxed">
                    {news.summary[lang]}
                  </p>
                </div>

                <div className="pt-3 border-t border-slate-100">
                  <button
                    onClick={() => setSelectedNewsModal(news)}
                    className="flex items-center gap-1.5 text-xs font-bold text-emerald-700 hover:text-emerald-800 transition"
                  >
                    <span>{t.btnReadMore}</span>
                    <ArrowRight className="w-3.5 h-3.5" />
                  </button>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>

      {/* News Modal Reader */}
      {selectedNewsModal && (
        <div className="fixed inset-0 bg-slate-950/70 backdrop-blur-sm z-50 flex items-center justify-center p-4 overflow-y-auto animate-fadeIn">
          <div className="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl relative my-8">
            <button
              onClick={() => setSelectedNewsModal(null)}
              className="absolute top-4 right-4 p-2 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 transition"
            >
              <X className="w-5 h-5" />
            </button>

            <div className="flex items-center gap-2 mb-3">
              <span className="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold">
                {selectedNewsModal.badge ? selectedNewsModal.badge[lang] : selectedNewsModal.date}
              </span>
              <span className="text-xs text-slate-400 font-semibold">{selectedNewsModal.date}</span>
            </div>

            <h3 className="text-xl sm:text-2xl font-extrabold text-slate-900 mb-4">
              {selectedNewsModal.title[lang]}
            </h3>

            {!hideImages && (
              <div className="rounded-2xl overflow-hidden mb-4 h-64 bg-slate-100">
                <img
                  src={selectedNewsModal.image}
                  alt={selectedNewsModal.title[lang]}
                  className="w-full h-full object-cover"
                />
              </div>
            )}

            <p className="text-sm text-slate-700 leading-relaxed font-normal mb-4">
              {selectedNewsModal.content[lang]}
            </p>

            <div className="pt-4 border-t border-slate-100 flex justify-end">
              <button
                onClick={() => setSelectedNewsModal(null)}
                className="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs hover:bg-slate-200 transition"
              >
                {t.btnClose}
              </button>
            </div>
          </div>
        </div>
      )}
    </section>
  );
};
