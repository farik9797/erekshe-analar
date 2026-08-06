import React, { useState } from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { FAQS } from '../data/mockData';
import { HelpCircle, Search, ChevronDown, ChevronUp } from 'lucide-react';

export const FaqSection: React.FC = () => {
  const { lang, t } = useAccessibility();
  const [searchQuery, setSearchQuery] = useState('');
  const [activeCategory, setActiveCategory] = useState<string>('all');
  const [openFaqId, setOpenFaqId] = useState<string | null>(FAQS[0].id);

  const categories = [
    { id: 'all', label: t.faqFilterAll },
    { id: 'general', label: t.faqFilterGeneral },
    { id: 'documents', label: t.faqFilterDocs },
    { id: 'rehabilitation', label: t.faqFilterRehab },
    { id: 'umay', label: t.faqFilterUmay }
  ];

  const filteredFaqs = FAQS.filter((faq) => {
    const matchesCat = activeCategory === 'all' || faq.category === activeCategory;
    const qText = faq.question[lang].toLowerCase();
    const aText = faq.answer[lang].toLowerCase();
    const matchesQuery = qText.includes(searchQuery.toLowerCase()) || aText.includes(searchQuery.toLowerCase());
    return matchesCat && matchesQuery;
  });

  return (
    <section id="faq" className="py-16 md:py-24 bg-white border-b border-slate-100">
      <div className="max-w-4xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-2xl mx-auto mb-12">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <HelpCircle className="w-4 h-4 text-emerald-600" />
            <span>{t.faqBadge}</span>
          </div>
          <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.faqTitle}
          </h2>
        </div>

        {/* Search Bar & Category Filters */}
        <div className="flex flex-col gap-4 mb-8">
          <div className="relative">
            <Search className="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" />
            <input
              type="text"
              value={searchQuery}
              onChange={(e) => setSearchQuery(e.target.value)}
              placeholder={t.faqSearchPlaceholder}
              className="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition"
            />
          </div>

          <div className="flex flex-wrap items-center justify-center gap-2">
            {categories.map((cat) => (
              <button
                key={cat.id}
                onClick={() => setActiveCategory(cat.id)}
                className={`px-3.5 py-1.5 rounded-xl text-xs font-bold transition ${
                  activeCategory === cat.id
                    ? 'bg-emerald-600 text-white shadow-xs'
                    : 'bg-slate-100 text-slate-700 hover:bg-slate-200'
                }`}
              >
                {cat.label}
              </button>
            ))}
          </div>
        </div>

        {/* Accordion FAQ Items */}
        <div className="flex flex-col gap-3">
          {filteredFaqs.map((faq) => {
            const isOpen = openFaqId === faq.id;
            return (
              <div
                key={faq.id}
                className={`rounded-2xl border transition-all ${
                  isOpen ? 'bg-emerald-50/50 border-emerald-300 shadow-sm' : 'bg-slate-50/80 border-slate-200 hover:bg-slate-100/80'
                }`}
              >
                <button
                  onClick={() => setOpenFaqId(isOpen ? null : faq.id)}
                  className="w-full p-5 text-left font-bold text-slate-900 text-sm sm:text-base flex items-center justify-between gap-4"
                >
                  <span>{faq.question[lang]}</span>
                  <div className={`p-1.5 rounded-xl transition ${isOpen ? 'bg-emerald-600 text-white' : 'bg-white text-slate-500'}`}>
                    {isOpen ? <ChevronUp className="w-4 h-4" /> : <ChevronDown className="w-4 h-4" />}
                  </div>
                </button>

                {isOpen && (
                  <div className="px-5 pb-5 pt-1 text-xs sm:text-sm text-slate-700 leading-relaxed border-t border-emerald-100/60 font-medium">
                    {faq.answer[lang]}
                  </div>
                )}
              </div>
            );
          })}

          {filteredFaqs.length === 0 && (
            <p className="text-center text-slate-500 py-8 text-sm">
              Вопросов по данному запросу не найдено.
            </p>
          )}
        </div>
      </div>
    </section>
  );
};
