import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import { useAccessibility } from '../context/AccessibilityContext';
import { RULES } from '../data/rules';
import { FadeIn } from '../components/FadeIn';
import { ScrollText, ChevronDown, ArrowLeft, ShieldCheck, ChevronsDownUp, ChevronsUpDown } from 'lucide-react';

export const RulesPage: React.FC = () => {
  const { lang, t } = useAccessibility();
  const L: 'ru' | 'kk' = lang === 'ru' ? 'ru' : 'kk';

  // По умолчанию открыт первый раздел — остальные свёрнуты для удобного сканирования на телефоне
  const [open, setOpen] = useState<Set<number>>(new Set([1]));

  const toggle = (n: number) =>
    setOpen((prev) => {
      const next = new Set(prev);
      next.has(n) ? next.delete(n) : next.add(n);
      return next;
    });

  const expandAll = () => setOpen(new Set(RULES.map((s) => s.n)));
  const collapseAll = () => setOpen(new Set());
  const allOpen = open.size === RULES.length;

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
              {t.rulesBadge}
            </span>
            <h1 className="text-2xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-3">
              {t.rulesTitle}
            </h1>
            <p className="text-emerald-200/90 text-sm font-semibold mb-3">{t.rulesFoundation}</p>
            <p className="text-slate-200 text-sm md:text-lg leading-relaxed max-w-2xl">
              {t.rulesDesc}
            </p>
          </div>
        </div>
      </FadeIn>

      {/* Accordion */}
      <FadeIn>
        <div className="max-w-4xl mx-auto px-4">
          {/* Controls */}
          <div className="flex items-center justify-between gap-3 mb-4">
            <span className="text-xs font-bold text-slate-500">
              {RULES.length} {t.rulesSectionsLabel}
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
            {RULES.map((section) => {
              const isOpen = open.has(section.n);
              return (
                <div
                  key={section.n}
                  className="bg-white rounded-2xl border border-slate-200/80 shadow-2xs overflow-hidden"
                >
                  <button
                    type="button"
                    onClick={() => toggle(section.n)}
                    aria-expanded={isOpen}
                    className="w-full flex items-center gap-3 p-4 sm:p-5 text-left hover:bg-emerald-50/40 transition cursor-pointer"
                  >
                    <span className="w-9 h-9 flex-shrink-0 rounded-xl bg-emerald-100 text-emerald-700 font-extrabold flex items-center justify-center text-sm">
                      {section.n}
                    </span>
                    <h2 className="flex-1 text-sm sm:text-base font-bold text-slate-900 leading-snug">
                      {section.title[L]}
                    </h2>
                    <ChevronDown
                      className={`w-5 h-5 text-emerald-600 flex-shrink-0 transition-transform duration-200 ${
                        isOpen ? 'rotate-180' : ''
                      }`}
                    />
                  </button>

                  {isOpen && (
                    <div className="px-4 sm:px-5 pb-5 pt-1 flex flex-col gap-3 border-t border-slate-100">
                      {section.clauses.map((c, i) => (
                        <div key={i} className="text-sm text-slate-700 leading-relaxed">
                          <p>
                            {c.n && <span className="font-bold text-emerald-700">{c.n}. </span>}
                            {c[L]}
                          </p>
                          {c.bullets && (
                            <ul className="mt-2 flex flex-col gap-1.5 pl-1">
                              {c.bullets.map((b, j) => (
                                <li key={j} className="flex items-start gap-2">
                                  <span className="mt-1.5 w-1.5 h-1.5 rounded-full bg-emerald-400 flex-shrink-0" />
                                  <span>{b[L]}</span>
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

          {/* Footer note */}
          <div className="mt-8 flex items-start gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200/70">
            <ScrollText className="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" />
            <p className="text-xs text-emerald-900/80 leading-relaxed">
              {L === 'ru'
                ? 'Ознакомление с Правилами и подтверждение согласия осуществляется при заключении договора в центре фонда.'
                : 'Қағидалармен танысу және келісімді растау орталықта шарт жасасу кезінде жүзеге асырылады.'}
            </p>
          </div>
        </div>
      </FadeIn>
    </div>
  );
};
