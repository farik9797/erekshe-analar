import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { SOCIAL_PROJECTS } from '../data/mockData';
import {
  HeartHandshake,
  Heart,
  CheckCircle2,
  Sparkles,
  Users,
  ShieldCheck,
  QrCode
} from 'lucide-react';

export const CharitySection: React.FC = () => {
  const { lang, t, openDonationModal, hideImages } = useAccessibility();

  return (
    <section id="charity" className="py-16 md:py-24 bg-slate-50 border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <Heart className="w-4 h-4 text-emerald-600 fill-emerald-500" />
            <span>{t.charityBadge}</span>
          </div>
          <h2 className="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.charityTitle}
          </h2>
          <p className="text-slate-600 text-sm sm:text-base mt-3">
            {t.charityDesc}
          </p>
        </div>

        {/* Projects Grid */}
        <div className="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 sm:gap-8 sm:overflow-visible sm:pb-0 scrollbar-none mb-16">
          {SOCIAL_PROJECTS.map((project) => {
            const isCompleted = project.status === 'completed';
            const progress = project.targetAmount
              ? Math.min(100, Math.round(((project.currentAmount || 0) / project.targetAmount) * 100))
              : 100;

            return (
              <div
                key={project.id}
                className="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl transition-all overflow-hidden flex flex-col justify-between flex-shrink-0 w-[85vw] max-w-[400px] sm:w-auto sm:max-w-none snap-center sm:snap-none"
              >
                {/* Project Image */}
                <div className="relative h-56 bg-slate-100">
                  {!hideImages ? (
                    <img
                      src={project.image}
                      alt={project.title[lang]}
                      className="w-full h-full object-cover"
                    />
                  ) : (
                    <div className="w-full h-full bg-emerald-800 text-white flex items-center justify-center p-4">
                      <span className="font-bold text-center">{project.title[lang]}</span>
                    </div>
                  )}
                  <div className="absolute top-4 left-4">
                    <span
                      className={`px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider ${
                        isCompleted
                          ? 'bg-emerald-600 text-white'
                          : 'bg-amber-500 text-slate-950 font-extrabold'
                      }`}
                    >
                      {isCompleted ? t.projectStatusCompleted : t.projectStatusActive}
                    </span>
                  </div>
                </div>

                {/* Body */}
                <div className="p-6 flex-1 flex flex-col justify-between gap-6">
                  <div>
                    <h3 className="text-xl font-bold text-slate-900 leading-snug">
                      {project.title[lang]}
                    </h3>
                    <p className="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                      {project.description[lang]}
                    </p>
                  </div>

                  {/* Funding Progress Bar */}
                  {project.targetAmount && (
                    <div className="flex flex-col gap-2">
                      <div className="flex items-center justify-between text-xs font-bold text-slate-700">
                        <span>Собрано: {(project.currentAmount || 0).toLocaleString()} ₸</span>
                        <span>Цель: {project.targetAmount.toLocaleString()} ₸</span>
                      </div>
                      <div className="w-full h-3 bg-slate-100 rounded-full overflow-hidden border border-slate-200">
                        <div
                          className="h-full bg-gradient-to-r from-emerald-500 to-teal-600 transition-all duration-500 rounded-full"
                          style={{ width: `${progress}%` }}
                        />
                      </div>
                    </div>
                  )}

                  <div className="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <div className="flex items-center gap-1.5 text-xs font-bold text-slate-600">
                      <Users className="w-4 h-4 text-emerald-600" />
                      <span>{t.projectBeneficiaries} {project.beneficiariesCount}</span>
                    </div>

                    <button
                      onClick={openDonationModal}
                      className="px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition flex items-center gap-1.5 shadow-md shadow-emerald-600/20"
                    >
                      <HeartHandshake className="w-4 h-4" />
                      <span>{t.btnSupportProject}</span>
                    </button>
                  </div>
                </div>
              </div>
            );
          })}
        </div>

        {/* Transparency & Bank Requisites Teaser */}
        <div className="bg-white rounded-3xl border border-slate-200 p-4 shadow-sm grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
          <div className="md:col-span-8 flex flex-col gap-3">
            <div className="flex items-center gap-2 text-emerald-700 font-bold text-xs uppercase tracking-wider">
              <ShieldCheck className="w-4 h-4" />
              <span>Прозрачность и отчетность</span>
            </div>
            <h3 className="text-2xl font-extrabold text-slate-900">
              {lang === 'ru' ? 'Как вы можете помочь фонду?' : 'Қорға қалай көмектесе аласыз?'}
            </h3>
            <p className="text-xs sm:text-sm text-slate-600 leading-relaxed">
              {lang === 'ru'
                ? 'Все пожертвования направляются строго на закупку коррекционного оборудования, организацию спортивных праздников и финансирование центра поддержки семей UMAY.'
                : 'Барлық қайырымдылық қаражаты түзету жабдықтарын сатып алуға, спорттық мерекелерді ұйымдастыруға бағытталады.'}
            </p>
          </div>

          <div className="md:col-span-4 flex justify-start md:justify-end">
            <button
              onClick={openDonationModal}
              className="px-6 py-3.5 rounded-xl text-xs font-extrabold text-slate-950 bg-amber-400 hover:bg-amber-300 transition shadow-lg flex items-center gap-2"
            >
              <QrCode className="w-4 h-4" />
              <span>Реквизиты и QR-код</span>
            </button>
          </div>
        </div>
      </div>
    </section>
  );
};
