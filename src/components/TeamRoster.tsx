import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { TEAM_ROSTER } from '../data/mockData';
import { Users } from 'lucide-react';

const ORDER = ['admin', 'logoped', 'defectolog', 'psycholog', 'afk', 'pool', 'vospitatel', 'vospitatel_asst', 'nanny', 'social', 'nurse'] as const;

const LABELS: Record<string, { ru: string; kk: string }> = {
  admin: { ru: 'Администрация', kk: 'Әкімшілік' },
  logoped: { ru: 'Логопеды', kk: 'Логопедтер' },
  defectolog: { ru: 'Дефектологи', kk: 'Дефектологтар' },
  psycholog: { ru: 'Психологи', kk: 'Психологтар' },
  afk: { ru: 'Инструкторы АФК', kk: 'ЕАФК нұсқаушылары' },
  pool: { ru: 'Инструктор по бассейну', kk: 'Бассейн нұсқаушысы' },
  vospitatel: { ru: 'Воспитатели', kk: 'Тәрбиешілер' },
  vospitatel_asst: { ru: 'Помощники воспитателя', kk: 'Тәрбиеші көмекшілері' },
  nanny: { ru: 'Нянечки', kk: 'Күтушілер' },
  social: { ru: 'Социальные работники', kk: 'Әлеуметтік қызметкерлер' },
  nurse: { ru: 'Медицинские сёстры', kk: 'Медбикелер' },
};

// Русское склонение: 1→специалист, 2-4→специалиста, 5+/11-14→специалистов
export const pluralRu = (n: number, one: string, few: string, many: string): string => {
  const m10 = n % 10;
  const m100 = n % 100;
  if (m10 === 1 && m100 !== 11) return one;
  if (m10 >= 2 && m10 <= 4 && (m100 < 12 || m100 > 14)) return few;
  return many;
};

export const TeamRoster: React.FC<{ withHeading?: boolean }> = ({ withHeading = false }) => {
  const { lang, t } = useAccessibility();
  const L: 'ru' | 'kk' = lang === 'ru' ? 'ru' : 'kk';

  const grouped: Record<string, typeof TEAM_ROSTER> = {};
  for (const p of TEAM_ROSTER) {
    (grouped[p.group] ||= []).push(p);
  }

  const groups = (
    <div className="max-w-5xl mx-auto px-4 space-y-10">
      {ORDER.filter((g) => grouped[g]?.length).map((g) => (
        <div key={g}>
          <div className="flex items-center gap-3 mb-4">
            <h3 className="text-lg sm:text-xl font-extrabold text-slate-900">{LABELS[g][L]}</h3>
            <span className="text-xs font-bold text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full">{grouped[g].length}</span>
            <span className="flex-1 h-px bg-slate-200" />
          </div>
          <div className="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-6">
            {grouped[g].map((p, i) => (
              <div key={i} className="bg-white rounded-2xl border border-slate-200/80 shadow-2xs hover:shadow-md hover:border-emerald-200 transition overflow-hidden flex flex-col">
                {/* Фото сверху; у кого нет фото — буква на том же месте */}
                <div className="relative aspect-[3/4] bg-emerald-50">
                  {p.photo ? (
                    <img src={p.photo} alt={p.name} loading="lazy" className="absolute inset-0 w-full h-full object-cover" />
                  ) : (
                    <div className="absolute inset-0 flex items-center justify-center text-5xl font-extrabold text-emerald-700">
                      {p.name.charAt(0)}
                    </div>
                  )}
                </div>
                <div className="p-3 sm:p-4">
                  <p className="font-bold text-slate-900 text-sm sm:text-base leading-snug">{p.name}</p>
                  {p.note && <p className="text-xs sm:text-sm text-emerald-700 font-semibold mt-1 leading-snug">{typeof p.note === 'string' ? p.note : p.note[L]}</p>}
                </div>
              </div>
            ))}
          </div>
        </div>
      ))}
    </div>
  );

  if (!withHeading) return groups;

  return (
    <section className="py-16 md:py-24 bg-slate-50 border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        <div className="text-center max-w-3xl mx-auto mb-14">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <Users className="w-4 h-4 text-emerald-600" />
            <span>{t.heroStatTeam} {L === 'ru' ? pluralRu(Number(t.heroStatTeam), 'специалист', 'специалиста', 'специалистов') : 'маман'}</span>
          </div>
          <h2 className="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight">{t.teamTitle}</h2>
        </div>
      </div>
      {groups}
    </section>
  );
};
