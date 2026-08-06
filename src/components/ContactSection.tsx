import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import {
  MapPin,
  Phone,
  MessageCircle,
  Mail,
  Instagram,
  Clock,
  Sparkles,
  Send
} from 'lucide-react';

export const ContactSection: React.FC = () => {
  const { lang, t, openEnrollModal } = useAccessibility();

  return (
    <section id="contacts" className="py-16 md:py-24 bg-white border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <Phone className="w-4 h-4 text-emerald-600" />
            <span>{t.contactBadge}</span>
          </div>
          <h2 className="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.contactTitle}
          </h2>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
          {/* Left Column: Headquarters Contact Cards */}
          <div className="lg:col-span-5 flex flex-col gap-6">
            <div className="bg-slate-900 text-white p-4 sm:p-8 rounded-3xl shadow-xl relative overflow-hidden">
              <div className="absolute top-0 right-0 w-64 h-64 bg-emerald-600/20 rounded-full blur-3xl pointer-events-none" />

              <span className="text-xs font-bold uppercase tracking-widest text-emerald-400">
                {t.contactHeadquarters}
              </span>
              <h3 className="text-2xl font-extrabold text-white mt-1 mb-6">
                ОФ «EREKSHE ANALAR»
              </h3>

              <div className="flex flex-col gap-5 text-sm font-medium">
                <div className="flex items-start gap-3">
                  <MapPin className="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" />
                  <div>
                    <p className="text-xs text-slate-400 uppercase font-bold">Адрес головного центра:</p>
                    <p className="text-white font-bold mt-0.5">г. Астана, ул. Аманат, 12/1</p>
                  </div>
                </div>

                <div className="flex items-start gap-3">
                  <Clock className="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" />
                  <div>
                    <p className="text-xs text-slate-400 uppercase font-bold">График работы:</p>
                    <p className="text-white font-bold mt-0.5">{t.workingHours}</p>
                  </div>
                </div>

                <div className="flex items-start gap-3">
                  <Phone className="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" />
                  <div>
                    <p className="text-xs text-slate-400 uppercase font-bold">{t.contactPhoneTitle}</p>
                    <a href="tel:+77172708090" className="text-emerald-300 font-bold hover:underline block mt-0.5">
                      +7 (7172) 70-80-90
                    </a>
                  </div>
                </div>

                <div className="flex items-start gap-3">
                  <MessageCircle className="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" />
                  <div>
                    <p className="text-xs text-slate-400 uppercase font-bold">WhatsApp филиалов:</p>
                    <a
                      href="https://wa.me/77084251212"
                      target="_blank"
                      rel="noopener noreferrer"
                      className="text-emerald-300 font-bold hover:underline block mt-0.5"
                    >
                      +7 (708) 425-12-12
                    </a>
                  </div>
                </div>

                <div className="flex items-start gap-3">
                  <Mail className="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" />
                  <div>
                    <p className="text-xs text-slate-400 uppercase font-bold">{t.contactEmailTitle}</p>
                    <a href="mailto:info@ereksheanalar.kz" className="text-slate-200 font-bold hover:underline block mt-0.5">
                      info@ereksheanalar.kz
                    </a>
                  </div>
                </div>

                <div className="flex items-start gap-3">
                  <Instagram className="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" />
                  <div>
                    <p className="text-xs text-slate-400 uppercase font-bold">Instagram:</p>
                    <a
                      href="https://instagram.com"
                      target="_blank"
                      rel="noopener noreferrer"
                      className="text-emerald-300 font-bold hover:underline block mt-0.5"
                    >
                      @erekshe_analar_astana
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {/* Right Column: Interactive Consultation Card */}
          <div className="lg:col-span-7 bg-slate-50 p-4 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between gap-6">
            <div>
              <span className="text-xs font-bold text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full uppercase">
                Запись на консультацию
              </span>
              <h3 className="text-2xl font-extrabold text-slate-900 mt-3">
                {t.formTitle}
              </h3>
              <p className="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed">
                {t.formSubtitle}
              </p>
            </div>

            <div className="bg-white p-6 rounded-2xl border border-slate-200 flex flex-col items-center text-center gap-4">
              <div className="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
                <Sparkles className="w-6 h-6" />
              </div>
              <div>
                <p className="font-bold text-slate-900 text-sm">
                  Бесплатные специальные социальные услуги в Астане
                </p>
                <p className="text-xs text-slate-500 mt-1">
                  Нажмите кнопку ниже, чтобы открыть интерактивную форму записи с выбором филиала и удобного времени.
                </p>
              </div>
              <button
                onClick={() => openEnrollModal()}
                className="w-full py-3.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-md shadow-emerald-600/20 flex items-center justify-center gap-2"
              >
                <Send className="w-4 h-4" />
                <span>Заполнить анкус записи</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};
