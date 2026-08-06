import React, { useState } from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { SPECIALISTS } from '../data/mockData';
import {
  Users,
  Award,
  GraduationCap,
  Briefcase,
  Quote,
  Sparkles,
  CheckCircle2
} from 'lucide-react';

export const TeamSection: React.FC = () => {
  const { lang, t, hideImages } = useAccessibility();
  const [activeCategory, setActiveCategory] = useState<string>('all');

  const categories = [
    { id: 'all', label: t.teamFilterAll },
    { id: 'management', label: t.teamFilterManagement },
    { id: 'logoped', label: t.teamFilterLogoped },
    { id: 'psycholog', label: t.teamFilterPsycholog },
    { id: 'afk_lfk', label: t.teamFilterPhysio }
  ];

  const director = SPECIALISTS.find((s) => s.id === 'kaleeva_saltanat') || SPECIALISTS[0];

  const filteredSpecialists = activeCategory === 'all'
    ? SPECIALISTS
    : SPECIALISTS.filter((s) => s.category === activeCategory);

  return (
    <section id="team" className="py-16 md:py-24 bg-white border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <Users className="w-4 h-4 text-emerald-600" />
            <span>{t.teamBadge}</span>
          </div>
          <h2 className="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.teamTitle}
          </h2>
          <p className="text-slate-600 text-sm sm:text-base mt-3">
            {t.teamSubtitle}
          </p>
        </div>

        {/* Director Spotlight Box */}
        <div className="bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-950 text-white rounded-3xl p-4 md:p-12 mb-16 shadow-2xl relative overflow-hidden">
          <div className="absolute top-0 right-0 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none" />

          <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
            {/* Director Photo */}
            <div className="lg:col-span-4">
              <div className="relative rounded-2xl overflow-hidden border-2 border-emerald-500/30 shadow-xl bg-slate-800">
                {!hideImages ? (
                  <img
                    src={director.image}
                    alt={director.name[lang]}
                    className="w-full h-[360px] object-cover"
                  />
                ) : (
                  <div className="w-full h-[360px] bg-slate-800 text-white flex items-center justify-center p-6 text-center">
                    <Users className="w-12 h-12 text-emerald-400 mb-2" />
                    <span className="font-bold">{director.name[lang]}</span>
                  </div>
                )}
                <div className="absolute bottom-3 left-3 right-3 bg-slate-900/90 backdrop-blur-md p-3 rounded-xl border border-slate-700">
                  <p className="text-xs font-bold text-emerald-400">{t.directorTitle}</p>
                </div>
              </div>
            </div>

            {/* Director Info */}
            <div className="lg:col-span-8 flex flex-col gap-5">
              <div>
                <span className="text-xs font-bold text-emerald-400 uppercase tracking-widest bg-emerald-950/80 px-3 py-1 rounded-md border border-emerald-800">
                  {t.directorTitle}
                </span>
                <h3 className="text-2xl sm:text-3xl font-extrabold text-white mt-2">
                  {director.name[lang]}
                </h3>
              </div>

              <p className="text-sm sm:text-base text-slate-300 leading-relaxed">
                {t.directorBio}
              </p>

              {director.quote && (
                <div className="bg-emerald-950/60 p-5 rounded-2xl border border-emerald-800/80 relative">
                  <Quote className="w-8 h-8 text-emerald-500/30 absolute top-3 right-3" />
                  <p className="text-xs sm:text-sm font-semibold italic text-emerald-200 leading-relaxed relative z-10">
                    «{director.quote[lang]}»
                  </p>
                </div>
              )}

              {/* Specialization List */}
              <div className="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                {director.specialization[lang].map((spec, i) => (
                  <div key={i} className="flex items-center gap-2 text-xs font-bold text-slate-200">
                    <CheckCircle2 className="w-4 h-4 text-emerald-400 flex-shrink-0" />
                    <span>{spec}</span>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>

        {/* Structure & Departments Grid Overview */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
          <div className="bg-slate-50 p-6 rounded-3xl border border-slate-200/80 shadow-2xs">
            <div className="w-10 h-10 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold mb-4">
              <Briefcase className="w-5 h-5" />
            </div>
            <h4 className="text-lg font-bold text-slate-900">{t.deputyDirectorTitle}</h4>
            <p className="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
              {t.deputyDirectorBio}
            </p>
          </div>

          <div className="bg-slate-50 p-6 rounded-3xl border border-slate-200/80 shadow-2xs">
            <div className="w-10 h-10 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold mb-4">
              <GraduationCap className="w-5 h-5" />
            </div>
            <h4 className="text-lg font-bold text-slate-900">{t.methodologicalTitle}</h4>
            <p className="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
              {t.methodologicalBio}
            </p>
          </div>

          <div className="bg-slate-50 p-6 rounded-3xl border border-slate-200/80 shadow-2xs">
            <div className="w-10 h-10 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold mb-4">
              <Award className="w-5 h-5" />
            </div>
            <h4 className="text-lg font-bold text-slate-900">
              {lang === 'ru' ? 'Педагоги и Воспитатели' : 'Педагогтар мен Тәрбиешілер'}
            </h4>
            <p className="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
              {lang === 'ru'
                ? 'Формируют навыки самообслуживания, проводят развивающие занятия и создают доброжелательную атмосферу.'
                : 'Өзіне-өзі қызмет көрсету дағдыларын қалыптастырады, дамытушы сабақтар өткізеді және жайлы атмосфера жасайды.'}
            </p>
          </div>
        </div>

        {/* Team Category Filter Tabs */}
        <div className="flex overflow-x-auto sm:flex-wrap items-center justify-start sm:justify-center gap-2 mb-8 pb-2 sm:pb-0 -mx-4 px-4 sm:mx-0 sm:px-0 scrollbar-none">
          {categories.map((cat) => (
            <button
              key={cat.id}
              onClick={() => setActiveCategory(cat.id)}
              className={`px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition flex-shrink-0 cursor-pointer ${
                activeCategory === cat.id
                  ? 'bg-emerald-600 text-white shadow-md shadow-emerald-600/20'
                  : 'bg-slate-100 text-slate-700 hover:bg-slate-200'
              }`}
            >
              {cat.label}
            </button>
          ))}
        </div>

        {/* Mobile Swipe Hint */}
        <p className="text-[11px] text-slate-400 text-center mb-3 sm:hidden font-medium">
          ← {lang === 'ru' ? 'Смахните карточки влево / вправо' : 'Карточкаларды солға / оңға сырғытыңыз'} →
        </p>

        {/* Specialist Cards Grid / Mobile Slider */}
        <div className="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 lg:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
          {filteredSpecialists.map((spec) => (
            <div
              key={spec.id}
              className="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl transition-all p-6 flex flex-col justify-between gap-4 flex-shrink-0 w-[85vw] max-w-[320px] sm:w-auto sm:max-w-none snap-center sm:snap-none"
            >
              <div>
                <div className="flex items-center gap-4 mb-4">
                  <div className="w-16 h-16 rounded-2xl overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-200">
                    {!hideImages ? (
                      <img
                        src={spec.image}
                        alt={spec.name[lang]}
                        className="w-full h-full object-cover"
                      />
                    ) : (
                      <div className="w-full h-full bg-emerald-800 text-white flex items-center justify-center font-bold text-xs">
                        {spec.name[lang].slice(0, 2)}
                      </div>
                    )}
                  </div>
                  <div>
                    <span className="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">
                      {spec.experience[lang]}
                    </span>
                    <h4 className="text-base font-bold text-slate-900 mt-1 leading-snug">
                      {spec.name[lang]}
                    </h4>
                  </div>
                </div>

                <p className="text-xs font-bold text-emerald-800 mb-2">{spec.role[lang]}</p>

                <p className="text-xs text-slate-600 leading-relaxed mb-3">{spec.bio[lang]}</p>

                <div className="text-[11px] text-slate-500 pt-3 border-t border-slate-100">
                  <p className="font-semibold text-slate-700 mb-1">{t.specialistEducation} {spec.education[lang]}</p>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};
