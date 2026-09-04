import React, { useState } from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { SERVICES } from '../data/mockData';
import { ServiceItem } from '../types';
import { FadeIn } from './FadeIn';
import { motion, AnimatePresence } from 'motion/react';
import {
  MessageSquareText,
  Brain,
  HeartHandshake,
  Activity,
  Dumbbell,
  Zap,
  Waves,
  Bath,
  Sparkles,
  Home,
  Users,
  Clock,
  ChevronRight,
  CheckCircle2,
  MapPin
} from 'lucide-react';

export const ServicesSection: React.FC = () => {
  const { lang, t, openServiceModal, openEnrollModal, hideImages } = useAccessibility();
  const [activeCategory, setActiveCategory] = useState<string>('all');

  const categories = [
    { id: 'all', label: t.filterAll },
    { id: 'correction', label: t.filterCorrection },
    { id: 'physical', label: t.filterPhysical },
    { id: 'water', label: t.filterWater },
    { id: 'medical', label: t.filterMedical },
    { id: 'social', label: t.filterSocial },
    { id: 'parents', label: t.filterParents }
  ];

  const filteredServices = activeCategory === 'all'
    ? SERVICES
    : SERVICES.filter((s) => s.category === activeCategory);

  const renderIcon = (name: string) => {
    switch (name) {
      case 'MessageSquareText': return <MessageSquareText className="w-6 h-6 text-emerald-600" />;
      case 'Brain': return <Brain className="w-6 h-6 text-emerald-600" />;
      case 'HeartHandshake': return <HeartHandshake className="w-6 h-6 text-emerald-600" />;
      case 'Activity': return <Activity className="w-6 h-6 text-emerald-600" />;
      case 'Dumbbell': return <Dumbbell className="w-6 h-6 text-emerald-600" />;
      case 'Zap': return <Zap className="w-6 h-6 text-emerald-600" />;
      case 'Waves': return <Waves className="w-6 h-6 text-sky-600" />;
      case 'Bath': return <Bath className="w-6 h-6 text-sky-600" />;
      case 'Sparkles': return <Sparkles className="w-6 h-6 text-amber-600" />;
      case 'Home': return <Home className="w-6 h-6 text-emerald-600" />;
      case 'Users': return <Users className="w-6 h-6 text-emerald-600" />;
      default: return <Sparkles className="w-6 h-6 text-emerald-600" />;
    }
  };

  return (
    <section id="services" className="py-16 md:py-24 bg-slate-50 border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-12">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <Sparkles className="w-4 h-4 text-emerald-600" />
            <span>{t.servicesBadge}</span>
          </div>
          <h2 className="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.servicesTitle}
          </h2>
          <p className="text-slate-600 text-sm sm:text-base mt-3">
            {t.servicesDesc}
          </p>
        </div>

        {/* Category Filters */}
        <div className="relative mb-8">
          <div className="flex items-center gap-2 overflow-x-auto scrollbar-none pb-2 -mx-4 pl-4 pr-16 sm:mx-0 sm:pl-0 sm:pr-16">
            {categories.map((cat) => (
              <button
                key={cat.id}
                onClick={() => setActiveCategory(cat.id)}
                className={`whitespace-nowrap flex-shrink-0 px-3.5 py-2 rounded-full text-xs sm:text-sm font-bold transition shadow-2xs ${
                  activeCategory === cat.id
                    ? 'bg-emerald-600 text-white shadow-md shadow-emerald-600/20'
                    : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'
                }`}
              >
                {cat.label}
              </button>
            ))}
          </div>
          {/* Подсказка: строку фильтров можно листать */}
          <div className="pointer-events-none absolute top-0 bottom-2 right-0 flex items-center gap-1 pl-10 pr-0.5 bg-gradient-to-l from-slate-50 via-slate-50/95 to-transparent">
            <ChevronRight className="w-5 h-5 text-emerald-500 animate-pulse" />
          </div>
        </div>

        {/* Services Grid with FadeIn */}
        <motion.div
          layout
          className="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 lg:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none"
        >
          <AnimatePresence mode="popLayout">
            {filteredServices.map((service, index) => (
              <motion.div
                key={service.id}
                layout
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                exit={{ opacity: 0, scale: 0.95 }}
                transition={{ duration: 0.35, delay: index * 0.04 }}
                className="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl hover:border-emerald-300 transition-all duration-200 flex flex-col overflow-hidden group flex-shrink-0 w-[85vw] max-w-[340px] sm:w-auto sm:max-w-none snap-center sm:snap-none"
              >
                {/* Image Banner */}
                <div
                  onClick={() => openServiceModal(service)}
                  className="relative h-48 overflow-hidden bg-slate-100 cursor-pointer"
                >
                  {!hideImages ? (
                    <img
                      src={service.image}
                      alt={service.title[lang]}
                      className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                    />
                  ) : (
                    <div className="w-full h-full bg-emerald-800 text-white flex items-center justify-center p-4">
                      <span className="font-bold text-center">{service.title[lang]}</span>
                    </div>
                  )}
                  <div className="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-xl flex items-center gap-2 shadow-xs">
                    {renderIcon(service.iconName)}
                    <span className="text-xs font-bold text-slate-900">{service.targetAge[lang]}</span>
                  </div>
                </div>

                {/* Card Body */}
                <div
                  onClick={() => openServiceModal(service)}
                  className="p-6 flex-1 flex flex-col justify-between gap-4 cursor-pointer"
                >
                  <div>
                    <h3 className="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition-colors">
                      {service.title[lang]}
                    </h3>
                    <p className="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed line-clamp-3">
                      {service.shortDesc[lang]}
                    </p>

                    {/* Indications list preview */}
                    <div className="mt-4 pt-3 border-t border-slate-100 flex flex-col gap-1.5">
                      <p className="text-[11px] font-bold uppercase tracking-wider text-slate-500">
                        {t.serviceIndications}
                      </p>
                      <div className="flex flex-wrap gap-1.5">
                        {service.indications[lang].slice(0, 3).map((ind, i) => (
                          <span
                            key={i}
                            className="px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 text-[11px] font-medium"
                          >
                            {ind}
                          </span>
                        ))}
                        {service.indications[lang].length > 3 && (
                          <span className="text-[11px] font-bold text-emerald-600 py-0.5">
                            +{service.indications[lang].length - 3}
                          </span>
                        )}
                      </div>
                    </div>
                  </div>

                  {/* Footer details */}
                  <div className="pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
                    <div className="flex items-center gap-1.5 text-xs font-semibold text-slate-500">
                      <Clock className="w-3.5 h-3.5 text-emerald-600" />
                      <span>{service.duration[lang]}</span>
                    </div>
                    <span className="text-xs font-bold text-emerald-600 group-hover:translate-x-1 transition-transform flex items-center gap-0.5">
                      {t.btnServiceDetails} <ChevronRight className="w-3.5 h-3.5" />
                    </span>
                  </div>
                </div>
              </motion.div>
            ))}
          </AnimatePresence>
        </motion.div>
      </div>
    </section>
  );
};
