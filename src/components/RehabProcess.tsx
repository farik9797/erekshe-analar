import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import {
  FileText,
  PhoneCall,
  UserCheck,
  Stethoscope,
  ClipboardList,
  CalendarCheck,
  Sparkles,
  TrendingUp,
  Home,
  CheckCircle2
} from 'lucide-react';

export const RehabProcess: React.FC = () => {
  const { t, openEnrollModal } = useAccessibility();

  const steps = [
    { num: t.step1Num, title: t.step1Title, desc: t.step1Desc, icon: PhoneCall },
    { num: t.step2Num, title: t.step2Title, desc: t.step2Desc, icon: UserCheck },
    { num: t.step3Num, title: t.step3Title, desc: t.step3Desc, icon: FileText },
    { num: t.step4Num, title: t.step4Title, desc: t.step4Desc, icon: Stethoscope },
    { num: t.step5Num, title: t.step5Title, desc: t.step5Desc, icon: ClipboardList },
    { num: t.step6Num, title: t.step6Title, desc: t.step6Desc, icon: CalendarCheck },
    { num: t.step7Num, title: t.step7Title, desc: t.step7Desc, icon: Sparkles },
    { num: t.step8Num, title: t.step8Title, desc: t.step8Desc, icon: TrendingUp },
    { num: t.step9Num, title: t.step9Title, desc: t.step9Desc, icon: Home }
  ];

  return (
    <section id="process" className="py-16 md:py-24 bg-white border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <CheckCircle2 className="w-4 h-4 text-emerald-600" />
            <span>{t.stepsBadge}</span>
          </div>
          <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.stepsTitle}
          </h2>
          <p className="text-slate-600 text-sm sm:text-base mt-3">
            {t.stepsSubtitle}
          </p>
        </div>

        {/* 9-Step Timeline Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {steps.map((step, idx) => {
            const IconComp = step.icon;
            return (
              <div
                key={idx}
                className="bg-slate-50 hover:bg-emerald-50/50 p-6 rounded-3xl border border-slate-200/70 hover:border-emerald-300 transition-all duration-200 flex flex-col justify-between group shadow-2xs"
              >
                <div>
                  <div className="flex items-center justify-between mb-4">
                    <span className="text-xs font-black tracking-widest text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full uppercase">
                      {step.num}
                    </span>
                    <div className="w-10 h-10 rounded-2xl bg-white text-emerald-600 flex items-center justify-center shadow-xs group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                      <IconComp className="w-5 h-5" />
                    </div>
                  </div>

                  <h3 className="text-lg font-bold text-slate-900 group-hover:text-emerald-800 transition-colors">
                    {step.title}
                  </h3>
                  <p className="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                    {step.desc}
                  </p>
                </div>
              </div>
            );
          })}
        </div>

        {/* Bottom CTA Banner */}
        <div className="mt-12 text-center bg-gradient-to-r from-emerald-600 to-teal-700 text-white p-8 rounded-3xl shadow-xl flex flex-col sm:flex-row items-center justify-between gap-6">
          <div className="text-left max-w-2xl">
            <h3 className="text-xl font-bold">Готовы сделать первый шаг к реабилитации?</h3>
            <p className="text-xs sm:text-sm text-emerald-100 mt-1">
              Оставьте заявку, и наш экспертный методист свяжется с вами для первично бесплатных консультаций.
            </p>
          </div>
          <button
            onClick={() => openEnrollModal()}
            className="px-6 py-3.5 rounded-xl text-xs font-bold text-emerald-950 bg-white hover:bg-emerald-50 transition shadow-md whitespace-nowrap"
          >
            {t.btnEnroll}
          </button>
        </div>
      </div>
    </section>
  );
};
