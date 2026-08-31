import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { TEAM_ROSTER } from '../data/mockData';
import { MapPin } from 'lucide-react';

const ORDER = ['logoped', 'defectolog', 'psycholog', 'afk', 'pool', 'social', 'nurse'] as const;

const LABELS: Record<string, { ru: string; kk: string }> = {
  logoped: { ru: 'Логопеды', kk: 'Логопедтер' },
  defectolog: { ru: 'Дефектологи', kk: 'Дефектологтар' },
  psycholog: { ru: 'Психологи', kk: 'Психологтар' },
  afk: { ru: 'Инструкторы АФК', kk: 'ЕАФК нұсқаушылары' },
  pool: { ru: 'Инструктор по бассейну', kk: 'Бассейн нұсқаушысы' },
  social: { ru: 'Социальные работники', kk: 'Әлеуметтік қызметкерлер' },
  nurse: { ru: 'Медицинские сёстры', kk: 'Медбикелер' },
};
const EDU = { ru: 'Образование', kk: 'Білімі' } as const;

export const TeamRoster: React.FC = () => {
  const { lang } = useAccessibility();
  const L: 'ru' | 'kk' = lang === 'ru' ? 'ru' : 'kk';

  const grouped: Record<string, typeof TEAM_ROSTER> = {};
  for (const p of TEAM_ROSTER) {
    (grouped[p.group] ||= []).push(p);
  }

  return (
    <div className="max-w-7xl mx-auto px-4 space-y-10">
      {ORDER.filter((g) => grouped[g]?.length).map((g) => (
        <div key={g}>
          <div className="flex items-center gap-3 mb-4">
            <h3 className="text-lg sm:text-xl font-extrabold text-slate-900">{LABELS[g][L]}</h3>
            <span className="text-xs font-bold text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full">{grouped[g].length}</span>
            <span className="flex-1 h-px bg-slate-200" />
          </div>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
            {grouped[g].map((p, i) => (
              <div key={i} className="bg-white rounded-2xl border border-slate-200/80 shadow-2xs hover:shadow-md hover:border-emerald-200 transition p-4 flex items-start gap-3">
                <div className="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-700 font-extrabold flex items-center justify-center flex-shrink-0 text-lg">
                  {p.name.charAt(0)}
                </div>
                <div className="min-w-0">
                  <p className="font-bold text-slate-900 text-sm leading-snug">{p.name}</p>
                  {p.note && <p className="text-[11px] text-emerald-700 font-semibold mt-0.5">{p.note}</p>}
                  <p className="text-xs text-slate-500 mt-1">{EDU[L]}: {p.education}</p>
                  <p className="text-[11px] text-slate-500 mt-1 flex items-center gap-1">
                    <MapPin className="w-3 h-3 text-emerald-600 flex-shrink-0" />
                    <span className="truncate">{p.branch}</span>
                  </p>
                </div>
              </div>
            ))}
          </div>
        </div>
      ))}
    </div>
  );
};
