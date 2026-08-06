import React from 'react';
import { RehabProcess } from '../components/RehabProcess';
import { useAccessibility } from '../context/AccessibilityContext';
import { FadeIn } from '../components/FadeIn';
import { Map, Sparkles, CheckCircle, FileText, PhoneCall, Stethoscope, UserCheck } from 'lucide-react';

export const ProcessPage: React.FC = () => {
  const { lang, t, openEnrollModal } = useAccessibility();

  return (
    <div className="bg-slate-50 min-h-screen py-10 space-y-12">
      <FadeIn>
        <div className="max-w-7xl mx-auto px-4">
          <div className="bg-gradient-to-r from-emerald-900 via-teal-900 to-slate-900 text-white rounded-3xl p-8 md:p-12 shadow-xl">
            <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
              <Map className="w-4 h-4" />
              {lang === 'ru' ? 'Пошаговое руководство для родителей' : 'Ата-аналарға арналған қадамдық нұсқаулық'}
            </span>
            <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4">
              {t.processTitle}
            </h1>
            <p className="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6">
              {t.processDesc}
            </p>
            <button
              onClick={() => openEnrollModal()}
              className="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-emerald-500/30 flex items-center gap-2 cursor-pointer"
            >
              <Sparkles className="w-4 h-4" />
              <span>{t.btnEnroll}</span>
            </button>
          </div>
        </div>
      </FadeIn>

      <FadeIn>
        <RehabProcess />
      </FadeIn>

      {/* Required Documents checklist for Enrollment */}
      <FadeIn>
        <section className="max-w-7xl mx-auto px-4">
          <div className="bg-white rounded-3xl p-8 md:p-10 shadow-sm border border-slate-100">
            <div className="max-w-2xl mb-8">
              <h2 className="text-2xl font-extrabold text-slate-900 mb-2">
                {lang === 'ru' ? 'Документы, необходимые для зачисления' : 'Қабылдауға қажетті құжаттар'}
              </h2>
              <p className="text-slate-600 text-sm">
                {lang === 'ru'
                  ? 'Для оформления бесплатного курса реабилитации по государственной программе подготовите следующий пакет документов:'
                  : 'Мемлекеттік бағдарлама бойынша тегін оңалту курсын рәсімдеу үшін мына құжаттар пакетін дайындаңыз:'}
              </p>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs font-medium text-slate-700">
              <div className="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex items-start gap-3">
                <FileText className="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" />
                <div>
                  <p className="font-bold text-slate-900 text-sm mb-1">
                    {lang === 'ru' ? 'Удостоверение личности родителя / опекуна' : 'Ата-ананың / қамқоршының жеке куәлігі'}
                  </p>
                  <p className="text-slate-500">
                    {lang === 'ru' ? 'Копия и оригинал для сверки данных' : 'Сәйкестендіру үшін көшірмесі мен түпнұсқасы'}
                  </p>
                </div>
              </div>

              <div className="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex items-start gap-3">
                <FileText className="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" />
                <div>
                  <p className="font-bold text-slate-900 text-sm mb-1">
                    {lang === 'ru' ? 'Свидетельство о рождении ребенка' : 'Баланың туу туралы куәлігі'}
                  </p>
                  <p className="text-slate-500">
                    {lang === 'ru' ? 'Копия свидетельства с ИИН ребенка' : 'Баланың ЖСН бар куәлігінің көшірмесі'}
                  </p>
                </div>
              </div>

              <div className="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex items-start gap-3">
                <FileText className="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" />
                <div>
                  <p className="font-bold text-slate-900 text-sm mb-1">
                    {lang === 'ru' ? 'Справка об инвалидности или заключение ПМПК' : 'Мүгедектік туралы анықтама немесе ПМПК қорытындысы'}
                  </p>
                  <p className="text-slate-500">
                    {lang === 'ru' ? 'Подтверждающий документ с рекомендациями' : 'Уәкілетті органның ұсынымдары бар растаушы құжат'}
                  </p>
                </div>
              </div>

              <div className="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex items-start gap-3">
                <FileText className="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" />
                <div>
                  <p className="font-bold text-slate-900 text-sm mb-1">
                    {lang === 'ru' ? 'Медицинская карта (форма 027/у или 052/у)' : 'Медициналық карта (027/у немесе 052/у нысаны)'}
                  </p>
                  <p className="text-slate-500">
                    {lang === 'ru' ? 'Выписка из участковой поликлиники' : 'Учаскелік емханадан үзінді көшірме'}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
      </FadeIn>
    </div>
  );
};
