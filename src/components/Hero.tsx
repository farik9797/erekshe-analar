import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import heroImg from '../assets/images/regenerated_image_1785993681411.webp';
import {
  Sparkles,
  MapPin,
  Heart,
  ShieldCheck,
  CheckCircle2,
  Users,
  Award,
  ArrowRight
} from 'lucide-react';

export const Hero: React.FC = () => {
  const { t, openEnrollModal, hideImages } = useAccessibility();

  return (
    <section className="relative overflow-hidden bg-gradient-to-b from-emerald-50/70 via-white to-slate-50 py-5 md:py-20 border-b border-slate-100">
      {/* Decorative subtle background accents */}
      <div className="absolute top-0 right-0 w-96 h-96 bg-emerald-200/20 rounded-full blur-3xl pointer-events-none" />
      <div className="absolute bottom-0 left-0 w-80 h-80 bg-teal-200/20 rounded-full blur-3xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-[15px] sm:px-4 relative z-10">
        <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
          {/* Left Column: Text & Value Prop — на мобильном по центру, на десктопе слева */}
          <div className="lg:col-span-7 flex flex-col gap-6 text-center lg:text-left">
            {/* Top Tag */}
            <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100/90 text-emerald-900 border border-emerald-200 text-xs font-bold w-fit mx-auto lg:mx-0">
              <ShieldCheck className="w-4 h-4 text-emerald-600" />
              <span>{t.heroBadge}</span>
              <span className="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse" />
            </div>

            {/* Main Headline */}
            <h1 className="text-[1.9rem] sm:text-4xl lg:text-5xl font-extrabold text-slate-900 leading-tight tracking-tight">
              {t.heroTitle}
            </h1>

            {/* Description */}
            <p className="text-base sm:text-lg text-slate-600 font-normal leading-relaxed">
              {t.heroDescription}
            </p>

            {/* Action Buttons — на мобильном во всю ширину (макс. 390px), по центру; на десктопе в ряд по контенту */}
            <div className="flex flex-col items-center sm:flex-row sm:flex-wrap sm:items-center gap-3.5 pt-2">
              <button
                onClick={() => openEnrollModal()}
                className="w-full justify-center text-center sm:w-auto flex items-center gap-2 px-6 py-3.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-lg shadow-emerald-600/25 transition hover:scale-[1.02] active:scale-[0.98]"
              >
                <Sparkles className="w-5 h-5" />
                <span>{t.heroCtaEnroll}</span>
              </button>

              <a
                href="#branches"
                className="w-full justify-center text-center sm:w-auto flex items-center gap-2 px-5 py-3.5 rounded-xl text-sm font-bold text-slate-700 bg-white hover:bg-slate-50 border border-slate-200 transition shadow-xs"
              >
                <MapPin className="w-4 h-4 text-emerald-600" />
                <span>{t.heroCtaBranches}</span>
              </a>

              <a
                href="#umay"
                className="w-full justify-center text-center sm:w-auto flex items-center gap-2 px-5 py-3.5 rounded-xl text-sm font-bold text-amber-900 bg-amber-50 hover:bg-amber-100/80 border border-amber-200 transition"
              >
                <Heart className="w-4 h-4 text-amber-600 fill-amber-500" />
                <span>{t.heroCtaUmay}</span>
              </a>
            </div>

            {/* Quick Benefits Pills */}
            <div className="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-4 border-t border-slate-200/60 justify-items-center lg:justify-items-start">
              <div className="flex items-center gap-2 text-xs font-semibold text-slate-700">
                <CheckCircle2 className="w-4 h-4 text-emerald-600 flex-shrink-0" />
                <span>100% Бесплатно</span>
              </div>
              <div className="flex items-center gap-2 text-xs font-semibold text-slate-700">
                <CheckCircle2 className="w-4 h-4 text-emerald-600 flex-shrink-0" />
                <span>Индивидуальная ИПР</span>
              </div>
              <div className="flex items-center gap-2 text-xs font-semibold text-slate-700">
                <CheckCircle2 className="w-4 h-4 text-emerald-600 flex-shrink-0" />
                <span>Поддержка матерей</span>
              </div>
            </div>
          </div>

          {/* Right Column: Hero Visual Image & Stats Card */}
          <div className="lg:col-span-5 relative">
            <div className="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-100">
              {!hideImages ? (
                <img
                  src={heroImg}
                  alt="Занятия в центре EREKSHE ANALAR"
                  className="w-full h-[260px] sm:h-[360px] md:h-[420px] object-cover"
                />
              ) : (
                <div className="w-full h-[260px] sm:h-[360px] md:h-[420px] bg-emerald-800 text-white flex flex-col items-center justify-center p-6 text-center">
                  <Heart className="w-16 h-16 text-emerald-300 mb-3" />
                  <p className="font-bold text-lg">{t.foundationName}</p>
                  <p className="text-xs text-emerald-200">{t.foundationTagline}</p>
                </div>
              )}

              {/* Floating Overlay Badge */}
              <div className="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md rounded-2xl p-4 shadow-lg border border-slate-100 flex items-center justify-between">
                <div className="flex items-center gap-3">
                  <div className="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
                    <Award className="w-5 h-5" />
                  </div>
                  <div>
                    <p className="text-xs font-bold text-slate-900">г. Астана</p>
                    <p className="text-[11px] text-slate-500 font-medium">4 филиала социальной защиты</p>
                  </div>
                </div>
                <a
                  href="#branches"
                  className="p-2 rounded-xl bg-emerald-600 text-white hover:bg-emerald-700 transition"
                >
                  <ArrowRight className="w-4 h-4" />
                </a>
              </div>
            </div>
          </div>
        </div>

        {/* 4 Trust Metrics Cards */}
        <div className="grid grid-cols-2 md:grid-cols-4 gap-4 mt-12">
          <div className="bg-white p-5 rounded-2xl border border-slate-100 shadow-xs hover:border-emerald-200 transition">
            <p className="text-2xl sm:text-3xl font-extrabold text-emerald-700 tracking-tight">
              {t.heroStatChildren}
            </p>
            <p className="text-xs text-slate-600 font-medium mt-1">{t.heroStatChildrenLabel}</p>
          </div>

          <div className="bg-white p-5 rounded-2xl border border-slate-100 shadow-xs hover:border-emerald-200 transition">
            <p className="text-2xl sm:text-3xl font-extrabold text-emerald-700 tracking-tight">
              {t.heroStatBranches}
            </p>
            <p className="text-xs text-slate-600 font-medium mt-1">{t.heroStatBranchesLabel}</p>
          </div>

          <div className="bg-white p-5 rounded-2xl border border-slate-100 shadow-xs hover:border-emerald-200 transition">
            <p className="text-2xl sm:text-3xl font-extrabold text-emerald-700 tracking-tight">
              {t.heroStatTeam}
            </p>
            <p className="text-xs text-slate-600 font-medium mt-1">{t.heroStatTeamLabel}</p>
          </div>

          <div className="bg-white p-5 rounded-2xl border border-slate-100 shadow-xs hover:border-emerald-200 transition">
            <p className="text-2xl sm:text-3xl font-extrabold text-emerald-700 tracking-tight">
              {t.heroStatFree}
            </p>
            <p className="text-xs text-slate-600 font-medium mt-1">{t.heroStatFreeLabel}</p>
          </div>
        </div>
      </div>
    </section>
  );
};
