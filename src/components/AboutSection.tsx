import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import aboutPhotoImg from '../assets/images/regenerated_image_1785993218212.webp';
import {
  Heart,
  Target,
  Sparkles,
  ShieldCheck,
  Users,
  Award,
  Sun,
  BookOpen,
  Check,
  ArrowRight
} from 'lucide-react';

export const AboutSection: React.FC = () => {
  const { lang, t, hideImages, openEnrollModal } = useAccessibility();

  const valuesList = [
    t.value1,
    t.value2,
    t.value3,
    t.value4,
    t.value5,
    t.value6,
    t.value7,
    t.value8
  ];

  return (
    <section id="about" className="py-16 md:py-24 bg-white border-b border-slate-100 relative">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <Heart className="w-4 h-4 text-emerald-600 fill-emerald-500" />
            <span>{t.aboutBadge}</span>
          </div>
          <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.aboutTitle}
          </h2>
          <div className="w-16 h-1 bg-emerald-500 mx-auto mt-4 rounded-full" />
        </div>

        {/* Story & Mission Grid */}
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-16">
          {/* Left: History & Mission Content */}
          <div className="lg:col-span-7 flex flex-col gap-6">
            <div className="bg-slate-50 p-6 md:p-8 rounded-3xl border border-slate-100 shadow-xs">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold">
                  <BookOpen className="w-5 h-5" />
                </div>
                <h3 className="text-xl font-bold text-slate-900">{t.aboutHistoryTitle}</h3>
              </div>
              <p className="text-sm md:text-base text-slate-600 leading-relaxed">
                {t.aboutHistoryText}
              </p>
            </div>

            <div className="bg-gradient-to-br from-emerald-600 to-teal-700 text-white p-6 md:p-8 rounded-3xl shadow-lg shadow-emerald-700/20">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-10 h-10 rounded-xl bg-white/20 text-white flex items-center justify-center font-bold">
                  <Target className="w-5 h-5" />
                </div>
                <h3 className="text-xl font-bold text-white">{t.aboutMissionTitle}</h3>
              </div>
              <p className="text-sm md:text-base text-emerald-50 leading-relaxed font-medium">
                {t.aboutMissionText}
              </p>
            </div>
          </div>

          {/* Right: Visual Banner */}
          <div className="lg:col-span-5">
            <div className="relative rounded-3xl overflow-hidden shadow-xl border-4 border-slate-50 bg-slate-100">
              {!hideImages ? (
                <img
                  src={aboutPhotoImg}
                  alt="Дети и специалисты EREKSHE ANALAR"
                  className="w-full h-[380px] object-cover"
                />
              ) : (
                <div className="w-full h-[380px] bg-slate-800 text-slate-200 flex flex-col items-center justify-center p-6 text-center">
                  <Users className="w-12 h-12 text-emerald-400 mb-2" />
                  <p className="font-bold text-base">{t.foundationName}</p>
                </div>
              )}
              <div className="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent flex items-end p-6">
                <p className="text-white font-bold text-base leading-snug">
                  {lang === 'ru'
                    ? '«Каждый ребенок уникален и заслуживает внимания, профессионализма и равных возможностей»'
                    : '«Әр бала бірегей және назар аударуға, кәсібилікке және тең мүмкіндіктерге лайық»'}
                </p>
              </div>
            </div>
          </div>
        </div>

        {/* 8 Values Grid */}
        <div className="mb-20">
          <h3 className="text-2xl font-bold text-slate-900 text-center mb-8">
            {t.aboutValuesTitle}
          </h3>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            {valuesList.map((val, idx) => (
              <div
                key={idx}
                className="bg-emerald-50/60 hover:bg-emerald-100/80 p-5 rounded-2xl border border-emerald-100 transition flex items-start gap-3"
              >
                <div className="w-7 h-7 rounded-full bg-emerald-600 text-white flex items-center justify-center flex-shrink-0 text-xs font-bold mt-0.5">
                  <Check className="w-4 h-4" />
                </div>
                <span className="text-xs md:text-sm font-bold text-slate-800 leading-snug">{val}</span>
              </div>
            ))}
          </div>
        </div>

        {/* Center "UMAY" Spotlight Block */}
        <div id="umay" className="bg-gradient-to-r from-amber-50 via-orange-50 to-amber-100/80 rounded-3xl p-8 md:p-12 border border-amber-200/80 shadow-md relative overflow-hidden">
          <div className="absolute top-0 right-0 w-80 h-80 bg-amber-200/30 rounded-full blur-3xl pointer-events-none" />

          <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
            <div className="lg:col-span-8 flex flex-col gap-4">
              <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-200/80 text-amber-950 text-xs font-bold w-fit">
                <Sun className="w-4 h-4 text-amber-700" />
                <span>{t.umayBadge}</span>
              </div>

              <h3 className="text-2xl sm:text-3xl font-extrabold text-amber-950">
                {t.umayTitle}
              </h3>

              <p className="text-sm sm:text-base text-amber-900/90 leading-relaxed">
                {t.umayDesc}
              </p>

              {/* UMAY Features */}
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-2">
                <div className="flex items-center gap-2 bg-white/80 p-3 rounded-xl border border-amber-200 text-xs font-bold text-amber-950 shadow-2xs">
                  <Sparkles className="w-4 h-4 text-amber-600 flex-shrink-0" />
                  <span>{t.umayFeature1}</span>
                </div>
                <div className="flex items-center gap-2 bg-white/80 p-3 rounded-xl border border-amber-200 text-xs font-bold text-amber-950 shadow-2xs">
                  <ShieldCheck className="w-4 h-4 text-amber-600 flex-shrink-0" />
                  <span>{t.umayFeature2}</span>
                </div>
                <div className="flex items-center gap-2 bg-white/80 p-3 rounded-xl border border-amber-200 text-xs font-bold text-amber-950 shadow-2xs">
                  <Users className="w-4 h-4 text-amber-600 flex-shrink-0" />
                  <span>{t.umayFeature3}</span>
                </div>
                <div className="flex items-center gap-2 bg-white/80 p-3 rounded-xl border border-amber-200 text-xs font-bold text-amber-950 shadow-2xs">
                  <Award className="w-4 h-4 text-amber-600 flex-shrink-0" />
                  <span>{t.umayFeature4}</span>
                </div>
              </div>
            </div>

            <div className="lg:col-span-4 flex flex-col items-start lg:items-end justify-center">
              <button
                onClick={() => openEnrollModal('', 'umay')}
                className="flex items-center gap-2 px-6 py-4 rounded-2xl text-sm font-bold text-white bg-amber-800 hover:bg-amber-900 shadow-lg shadow-amber-900/20 transition hover:scale-[1.02] active:scale-[0.98]"
              >
                <span>{t.umayCta}</span>
                <ArrowRight className="w-4 h-4" />
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};
