import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import { useAccessibility } from '../context/AccessibilityContext';
import { STANDARDS, STANDARDS_SOURCE } from '../data/standards';
import { FadeIn } from '../components/FadeIn';
import { FileCheck, ChevronDown, ArrowLeft, ShieldCheck, ChevronsDownUp, ChevronsUpDown } from 'lucide-react';

export const StandardsPage: React.FC = () => {
  const { lang, t } = useAccessibility();
  const [open, setOpen] = useState<Set<number>>(new Set([0]));

  const toggle = (i: number) =>
    setOpen((prev) => {
      const next = new Set(prev);
      next.has(i) ? next.delete(i) : next.add(i);
      return next;
    });
  const expandAll = () => setOpen(new Set(STANDARDS.map((_, i) => i)));
  const collapseAll = () => setOpen(new Set());
  const allOpen = open.size === STANDARDS.length;

  return (
    <div className="bg-slate-50 min-h-screen py-10 space-y-10">
      {/* Hero */}
      <FadeIn>
        <div className="max-w-4xl mx-auto px-4">
          <Link
            to="/documents"
            className="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-emerald-700 transition mb-4 cursor-pointer"
          >
            <ArrowLeft className="w-4 h-4" />
            <span>{t.rulesBackToDocs}</span>
          </Link>
          <div className="bg-gradient-to-r from-slate-900 via-emerald-950 to-slate-900 text-white rounded-3xl p-5 md:p-12 shadow-xl">
            <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
              <ShieldCheck className="w-4 h-4" />
              {t.standardsBadge}
            </span>
            <h1 className="text-2xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-3">
              {t.standardsTitle}
            </h1>
            <p className="text-slate-200 text-sm md:text-lg leading-relaxed max-w-2xl mb-3">
              {t.standardsDesc}
            </p>
            <p className="text-emerald-200/80 text-xs font-medium">{STANDARDS_SOURCE[lang]}</p>
          </div>
        </div>
      </FadeIn>

      {/* Accordion */}
      <FadeIn>
        <div className="max-w-4xl mx-auto px-4">
          <div className="flex items-center justify-between gap-3 mb-4">
            <span className="text-xs font-bold text-slate-500">
              {STANDARDS.length} {t.rulesSectionsLabel}
            </span>
            <button
              type="button"
              onClick={allOpen ? collapseAll : expandAll}
              className="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold text-emerald-800 bg-emerald-100/80 hover:bg-emerald-200 transition cursor-pointer"
            >
              {allOpen ? <ChevronsDownUp className="w-3.5 h-3.5" /> : <ChevronsUpDown className="w-3.5 h-3.5" />}
              <span>{allOpen ? t.rulesCollapseAll : t.rulesExpandAll}</span>
            </button>
          </div>

          <div className="space-y-3">
            {STANDARDS.map((section, i) => {
              const isOpen = open.has(i);
              return (
                <div
                  key={i}
                  className="bg-white rounded-2xl border border-slate-200/80 shadow-2xs overflow-hidden"
                >
                  <button
                    type="button"
                    onClick={() => toggle(i)}
                    aria-expanded={isOpen}
                    className="w-full flex items-center gap-3 p-4 sm:p-5 text-left hover:bg-emerald-50/40 transition cursor-pointer"
                  >
                    <span className="w-9 h-9 flex-shrink-0 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                      <FileCheck className="w-4 h-4" />
                    </span>
                    <h2 className="flex-1 text-sm sm:text-base font-bold text-slate-900 leading-snug">
                      {section.title[lang]}
                    </h2>
                    <ChevronDown
                      className={`w-5 h-5 text-emerald-600 flex-shrink-0 transition-transform duration-200 ${
                        isOpen ? 'rotate-180' : ''
                      }`}
                    />
                  </button>

                  {isOpen && (
                    <div className="px-4 sm:px-5 pb-5 pt-1 flex flex-col gap-3 border-t border-slate-100">
                      {section.clauses.map((c, j) => (
                        <div key={j} className="text-sm text-slate-700 leading-relaxed">
                          <p>
                            {c.n && <span className="font-bold text-emerald-700">{c.n}. </span>}
                            {c.text[lang]}
                          </p>
                          {c.bullets && (
                            <ul className="mt-2 flex flex-col gap-1.5 pl-1">
                              {c.bullets.map((b, k) => (
                                <li key={k} className="flex items-start gap-2">
                                  <span className="mt-1.5 w-1.5 h-1.5 rounded-full bg-emerald-400 flex-shrink-0" />
                                  <span>{b[lang]}</span>
                                </li>
                              ))}
                            </ul>
                          )}
                        </div>
                      ))}
                    </div>
                  )}
                </div>
              );
            })}
          </div>

          <div className="mt-8 flex items-start gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200/70">
            <ShieldCheck className="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" />
            <p className="text-xs text-emerald-900/80 leading-relaxed">
              {lang === 'ru'
                ? 'Приведён текст официального государственного стандарта Республики Казахстан. Полная редакция публикуется в информационно-правовой системе «Әділет».'
                : 'Қазақстан Республикасының ресми мемлекеттік стандартының мәтіні келтірілген. Толық редакциясы «Әділет» ақпараттық-құқықтық жүйесінде жарияланады.'}
            </p>
          </div>
        </div>
      </FadeIn>
    </div>
  );
};
