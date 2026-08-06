import React from 'react';
import { AboutSection } from '../components/AboutSection';
import { DocumentsSection } from '../components/DocumentsSection';
import { PartnersSection } from '../components/PartnersSection';
import { useAccessibility } from '../context/AccessibilityContext';
import { FadeIn } from '../components/FadeIn';
import { ShieldCheck, Target, Heart, Award, Users, Building2, Sparkles, CheckCircle2 } from 'lucide-react';

export const AboutPage: React.FC = () => {
  const { lang, t, openEnrollModal } = useAccessibility();

  return (
    <div className="bg-slate-50 min-h-screen py-10 space-y-12">
      {/* Page Header Banner */}
      <FadeIn>
        <div className="max-w-7xl mx-auto px-4">
          <div className="bg-gradient-to-r from-emerald-800 via-teal-800 to-slate-900 text-white rounded-3xl p-8 md:p-12 shadow-xl relative overflow-hidden">
            <div className="absolute top-0 right-0 w-96 h-96 bg-emerald-500/10 rounded-full filter blur-3xl pointer-events-none"></div>
            <div className="relative z-10 max-w-3xl">
              <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
                <Award className="w-4 h-4" />
                {lang === 'ru' ? 'Общественный фонд «EREKSHE ANALAR»' : '«EREKSHE ANALAR» Қоғамдық қоры'}
              </span>
              <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4">
                {lang === 'ru' ? 'О нашем фонде и философии помощи' : 'Қорымыз бен көмек философиясы туралы'}
              </h1>
              <p className="text-slate-200 text-base md:text-lg leading-relaxed mb-6">
                {lang === 'ru'
                  ? 'Мы объединяем заботу о детях с особыми образовательными потребностями и всестороннюю психологическую, социальную поддержку их матерей.'
                  : 'Біз ерекше білім беру қажеттіліктері бар балаларға күтім жасауды және олардың аналарына жан-жақты психологиялық, әлеуметтік қолдауды біріктіреміз.'}
              </p>
              <div className="flex flex-wrap items-center gap-4">
                <button
                  onClick={() => openEnrollModal()}
                  className="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-emerald-500/30 flex items-center gap-2 cursor-pointer"
                >
                  <Sparkles className="w-4 h-4" />
                  <span>{t.btnEnroll}</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </FadeIn>

      {/* Main About Component */}
      <FadeIn>
        <AboutSection />
      </FadeIn>

      {/* Extended Structure & Statistics */}
      <FadeIn>
        <section className="max-w-7xl mx-auto px-4">
          <div className="bg-white rounded-3xl p-8 md:p-10 shadow-sm border border-slate-100">
            <div className="text-center max-w-2xl mx-auto mb-10">
              <h2 className="text-2xl md:text-3xl font-extrabold text-slate-900 mb-3">
                {lang === 'ru' ? 'Ключевые показатели работы фонда' : 'Қор жұмысының негізгі көрсеткіштері'}
              </h2>
              <p className="text-slate-600 text-sm">
                {lang === 'ru'
                  ? 'Реальные результаты работы наших 4 реабилитационных центров в городе Астана'
                  : 'Астана қаласындағы 4 оңалту орталығымыздың нақты жұмыс нәтижелері'}
              </p>
            </div>

            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
              <div className="bg-emerald-50/60 border border-emerald-100 p-6 rounded-2xl text-center">
                <div className="w-12 h-12 bg-emerald-600 text-white rounded-2xl mx-auto flex items-center justify-center font-bold mb-3 shadow-md">
                  <Users className="w-6 h-6" />
                </div>
                <div className="text-3xl font-black text-emerald-900 mb-1">1 200+</div>
                <div className="text-xs font-semibold text-emerald-800">
                  {lang === 'ru' ? 'Детей прошли реабилитацию' : 'Бала оңалтудан өтті'}
                </div>
              </div>

              <div className="bg-teal-50/60 border border-teal-100 p-6 rounded-2xl text-center">
                <div className="w-12 h-12 bg-teal-600 text-white rounded-2xl mx-auto flex items-center justify-center font-bold mb-3 shadow-md">
                  <Building2 className="w-6 h-6" />
                </div>
                <div className="text-3xl font-black text-teal-900 mb-1">4 филиала</div>
                <div className="text-xs font-semibold text-teal-800">
                  {lang === 'ru' ? 'В ключевых районах Астаны' : 'Астананың басты аудандарында'}
                </div>
              </div>

              <div className="bg-blue-50/60 border border-blue-100 p-6 rounded-2xl text-center">
                <div className="w-12 h-12 bg-blue-600 text-white rounded-2xl mx-auto flex items-center justify-center font-bold mb-3 shadow-md">
                  <Award className="w-6 h-6" />
                </div>
                <div className="text-3xl font-black text-blue-900 mb-1">45+</div>
                <div className="text-xs font-semibold text-blue-800">
                  {lang === 'ru' ? 'Сертифицированных врачей и педагогов' : 'Сертификатталған дәрігерлер мен педагогтар'}
                </div>
              </div>

              <div className="bg-amber-50/60 border border-amber-100 p-6 rounded-2xl text-center">
                <div className="w-12 h-12 bg-amber-600 text-white rounded-2xl mx-auto flex items-center justify-center font-bold mb-3 shadow-md">
                  <Heart className="w-6 h-6" />
                </div>
                <div className="text-3xl font-black text-amber-900 mb-1">100%</div>
                <div className="text-xs font-semibold text-amber-800">
                  {lang === 'ru' ? 'Бесплатные государственные социальные услуги' : 'Тегін мемлекеттік арнайы әлеуметтік қызметтер'}
                </div>
              </div>
            </div>
          </div>
        </section>
      </FadeIn>

      {/* Documents Section */}
      <FadeIn>
        <DocumentsSection />
      </FadeIn>

      {/* Partners Section */}
      <FadeIn>
        <PartnersSection />
      </FadeIn>
    </div>
  );
};
