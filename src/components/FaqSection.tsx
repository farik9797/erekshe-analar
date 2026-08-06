import React, { useState } from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { FAQS } from '../data/mockData';
import { HelpCircle, Search, ChevronDown, ChevronUp } from 'lucide-react';

export const FaqSection: React.FC = () => {
  const { lang, t } = useAccessibility();
  const [searchQuery, setSearchQuery] = useState('');
  const [openFaqId, setOpenFaqId] = useState<string | null>(FAQS[0].id);

  const filteredFaqs = FAQS.filter((faq) => {
    const qText = faq.question[lang].toLowerCase();
    const aText = faq.answer[lang].toLowerCase();
    return qText.includes(searchQuery.toLowerCase()) || aText.includes(searchQuery.toLowerCase());
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
          <h2 className="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.faqTitle}
          </h2>
        </div>

        {/* Search Bar */}
        <div className="relative mb-8">
          <Search className="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" />
          <input
            type="text"
            value={searchQuery}
            onChange={(e) => setSearchQuery(e.target.value)}
            placeholder={t.faqSearchPlaceholder}
            className="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition"
          />
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
