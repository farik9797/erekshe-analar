import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { FadeIn } from '../components/FadeIn';
import { Heart, Sparkles, Shield, Users, BookOpen, MessageSquare, Sun, CheckCircle2, PhoneCall } from 'lucide-react';

export const UmayPage: React.FC = () => {
  const { lang, t, openEnrollModal } = useAccessibility();

  return (
    <div className="bg-slate-50 min-h-screen py-10 space-y-12">
      {/* Hero Banner */}
      <FadeIn>
        <div className="max-w-7xl mx-auto px-4">
          <div className="bg-gradient-to-r from-rose-900 via-teal-900 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl relative overflow-hidden">
            <div className="relative z-10 max-w-3xl">
              <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-500/20 text-rose-200 text-xs font-bold border border-rose-400/30 mb-4">
                <Heart className="w-4 h-4 text-rose-400 fill-rose-400" />
                {t.umayBadge}
              </span>
              <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4">
                {t.umayTitle}
              </h1>
              <p className="text-slate-200 text-base md:text-lg leading-relaxed mb-6">
                {t.umayDesc}
              </p>
              <div className="flex flex-wrap items-center gap-4">
                <button
                  onClick={() => openEnrollModal()}
                  className="px-6 py-3 rounded-2xl bg-rose-500 hover:bg-rose-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-rose-500/30 flex items-center gap-2 cursor-pointer"
                >
                  <Sparkles className="w-4 h-4" />
                  <span>{lang === 'ru' ? 'Записаться в Центр UMAY' : 'UMAY Орталығына жазылу'}</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </FadeIn>

      {/* Program Details */}
      <FadeIn>
        <section className="max-w-7xl mx-auto px-4">
          <div className="bg-white rounded-3xl p-4 md:p-12 shadow-sm border border-slate-100">
            <div className="text-center max-w-2xl mx-auto mb-10">
              <h2 className="text-2xl md:text-3xl font-extrabold text-slate-900 mb-3">
                {lang === 'ru' ? 'Основные направления Центра UMAY' : 'UMAY Орталығының негізгі бағыттары'}
              </h2>
              <p className="text-slate-600 text-sm">
                {lang === 'ru'
                  ? 'Комплексный подход к поддержке эмоционального здоровья и ресурсного состояния матерей'
                  : 'Аналардың эмоционалды денсаулығы мен ресурстық жағдайын қолдауға кешенді әдіс'}
              </p>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <div className="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-200 transition">
                <div className="w-10 h-10 rounded-xl bg-rose-100 text-rose-700 flex items-center justify-center font-bold mb-4">
                  <Sun className="w-5 h-5" />
                </div>
                <h3 className="font-bold text-slate-900 text-lg mb-2">
                  {lang === 'ru' ? 'Психологическое консультирование' : 'Психологиялық кеңес беру'}
                </h3>
                <p className="text-xs text-slate-600 leading-relaxed">
                  {lang === 'ru'
                    ? 'Индивидуальные сессии с опытными психологами для преодоления тревоги, синдрома эмоционального выгорания и тяжелых жизненных состояний.'
                    : 'Үрейді, эмоционалды шаршау синдромын және ауыр өмірлік жағдайларды жеңу үшін тәжірибелі психологтармен жеке сессиялар.'}
                </p>
              </div>

              <div className="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-200 transition">
                <div className="w-10 h-10 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center font-bold mb-4">
                  <Sparkles className="w-5 h-5" />
                </div>
                <h3 className="font-bold text-slate-900 text-lg mb-2">
                  {lang === 'ru' ? 'Арт-терапия и творчество' : 'Арт-терапия және шығармашылық'}
                </h3>
                <p className="text-xs text-slate-600 leading-relaxed">
                  {lang === 'ru'
                    ? 'Ресурсные мастер-классы, арт-терапевтические группы, снятие мышечных и психологических зажимов через искусственные медитации.'
                    : 'Ресурстық шеберлік сыныптары, арт-терапиялық топтар, арт-медиация арқылы бұлшықет пен психологиялық қысымды жеңілдету.'}
                </p>
              </div>

              <div className="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-200 transition">
                <div className="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold mb-4">
                  <Users className="w-5 h-5" />
                </div>
                <h3 className="font-bold text-slate-900 text-lg mb-2">
                  {lang === 'ru' ? 'Группы взаимоподдержки' : 'Өзара қолдау топтары'}
                </h3>
                <p className="text-xs text-slate-600 leading-relaxed">
                  {lang === 'ru'
                    ? 'Безопасное пространство общения с другими мамами особых детей, обмен опытом, совместные мероприятия и дружеская атмосфера.'
                    : 'Ерекше балалардың басқа аналарымен қауіпсіз қарым-қатынас кеңістігі, тәжірибе алмасу, бірлескен іс-шаралар және достық атмосфера.'}
                </p>
              </div>

              <div className="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-200 transition">
                <div className="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold mb-4">
                  <Shield className="w-5 h-5" />
                </div>
                <h3 className="font-bold text-slate-900 text-lg mb-2">
                  {lang === 'ru' ? 'Юридическая консультация' : 'Заңгерлік кеңес'}
                </h3>
                <p className="text-xs text-slate-600 leading-relaxed">
                  {lang === 'ru'
                    ? 'Помощь квалифицированных юристов по вопросам пособий, государственных льгот, жилищных субсидий и оформления документов.'
                    : 'Жәрдемақылар, мемлекеттік жеңілдіктер, тұрғын үй субсидиялары және құжаттарды рәсімдеу мәселелері бойынша білікті заңгерлердің көмегі.'}
                </p>
              </div>

              <div className="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-200 transition">
                <div className="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold mb-4">
                  <BookOpen className="w-5 h-5" />
                </div>
                <h3 className="font-bold text-slate-900 text-lg mb-2">
                  {lang === 'ru' ? 'Обучающие лекции и тренинги' : 'Оқыту дәрістері мен тренингтер'}
                </h3>
                <p className="text-xs text-slate-600 leading-relaxed">
                  {lang === 'ru'
                    ? 'Семинары по домашнему сопровождению реабилитации ребенка, развивающим играм и бытовой адаптированности.'
                    : 'Баланы үйде оңалтуды сүйемелдеу, дамытушы ойындар мен тұрмыстық бейімділік бойынша семинарлар.'}
                </p>
              </div>

              <div className="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-200 transition">
                <div className="w-10 h-10 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center font-bold mb-4">
                  <MessageSquare className="w-5 h-5" />
                </div>
                <h3 className="font-bold text-slate-900 text-lg mb-2">
                  {lang === 'ru' ? 'Социальная адаптация' : 'Әлеуметтік бейімдеу'}
                </h3>
                <p className="text-xs text-slate-600 leading-relaxed">
                  {lang === 'ru'
                    ? 'Организация культурных выездов, совместных праздников, семейных пикников и экскурсий для мам и их детей.'
                    : 'Аналар мен олардың балалары үшін мәдени сапарлар, бірлескен мерекелер, отбасылық пикниктер мен экскурсиялар ұйымдастыру.'}
                </p>
              </div>
            </div>
          </div>
        </section>
      </FadeIn>
    </div>
  );
};
