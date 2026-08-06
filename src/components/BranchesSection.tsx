import React, { useState } from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { BRANCHES } from '../data/mockData';
import {
  MapPin,
  Phone,
  MessageCircle,
  Clock,
  Sparkles,
  Building2,
  Navigation,
  CheckCircle2,
  ExternalLink
} from 'lucide-react';

export const BranchesSection: React.FC = () => {
  const { lang, t, openEnrollModal, hideImages } = useAccessibility();
  const [selectedBranchId, setSelectedBranchId] = useState<string>(BRANCHES[0].id);

  const activeBranch = BRANCHES.find((b) => b.id === selectedBranchId) || BRANCHES[0];

  return (
    <section id="branches" className="py-16 md:py-24 bg-slate-50 border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-12">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <Building2 className="w-4 h-4 text-emerald-600" />
            <span>{t.branchesBadge}</span>
          </div>
          <h2 className="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.branchesTitle}
          </h2>
          <p className="text-slate-600 text-sm sm:text-base mt-3">
            {t.branchesSubtitle}
          </p>
        </div>

        {/* Branch Selector Tabs */}
        <div className="flex overflow-x-auto snap-x snap-mandatory gap-3 pb-3 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 md:grid-cols-4 sm:overflow-visible sm:pb-0 scrollbar-none mb-8">
          {BRANCHES.map((b) => {
            const isSelected = b.id === selectedBranchId;
            return (
              <button
                key={b.id}
                onClick={() => setSelectedBranchId(b.id)}
                className={`flex-shrink-0 w-[65vw] max-w-[240px] sm:w-auto sm:max-w-none snap-center sm:snap-none p-4 rounded-2xl text-left transition border shadow-2xs flex flex-col justify-between ${
                  isSelected
                    ? 'bg-emerald-700 text-white border-emerald-600 shadow-md shadow-emerald-700/20'
                    : 'bg-white text-slate-800 hover:bg-slate-100 border-slate-200'
                }`}
              >
                <div>
                  {b.isHeadquarters && (
                    <span
                      className={`text-[10px] font-extrabold uppercase tracking-wider px-2 py-0.5 rounded-full mb-2 inline-block ${
                        isSelected ? 'bg-emerald-500 text-white' : 'bg-emerald-100 text-emerald-800'
                      }`}
                    >
                      {t.headquartersTag}
                    </span>
                  )}
                  <p className="font-bold text-xs sm:text-sm leading-tight">{b.name[lang]}</p>
                </div>
                <p
                  className={`text-[11px] font-medium mt-3 flex items-center gap-1 ${
                    isSelected ? 'text-emerald-100' : 'text-slate-500'
                  }`}
                >
                  <MapPin className="w-3 h-3 flex-shrink-0" />
                  <span className="truncate">{b.address[lang]}</span>
                </p>
              </button>
            );
          })}
        </div>

        {/* Selected Branch Detail Spotlight */}
        <div className="bg-white rounded-3xl border border-slate-200 p-6 md:p-4 shadow-xl grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
          {/* Branch Info Column */}
          <div className="lg:col-span-7 flex flex-col gap-6">
            <div>
              <div className="flex items-center gap-2 mb-2">
                {activeBranch.isHeadquarters && (
                  <span className="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold">
                    {t.headquartersTag}
                  </span>
                )}
                <span className="px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold">
                  {activeBranch.district[lang]}
                </span>
              </div>
              <h3 className="text-[1.4rem] sm:text-3xl font-extrabold text-slate-900">
                {activeBranch.name[lang]}
              </h3>
            </div>

            {/* Address, Phone, Working Hours List */}
            <div className="grid grid-cols-2 gap-3 sm:gap-4">
              <div className="flex items-start gap-2 sm:gap-3 bg-slate-50 py-5 px-2.5 rounded-2xl border border-slate-100">
                <MapPin className="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" />
                <div>
                  <p className="text-xs font-bold text-slate-500 uppercase tracking-wider">
                    {t.branchAddressLabel}
                  </p>
                  <p className="text-xs sm:text-sm font-bold text-slate-900 mt-0.5">
                    {activeBranch.address[lang]}
                  </p>
                </div>
              </div>

              <div className="flex items-start gap-2 sm:gap-3 bg-slate-50 py-5 px-2.5 rounded-2xl border border-slate-100">
                <Clock className="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" />
                <div>
                  <p className="text-xs font-bold text-slate-500 uppercase tracking-wider">
                    {t.branchHoursLabel}
                  </p>
                  <p className="text-xs sm:text-sm font-bold text-slate-900 mt-0.5">
                    {activeBranch.workHours[lang]}
                  </p>
                </div>
              </div>

              <div className="flex items-start gap-2 sm:gap-3 bg-slate-50 py-5 px-2.5 rounded-2xl border border-slate-100">
                <Phone className="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" />
                <div>
                  <p className="text-xs font-bold text-slate-500 uppercase tracking-wider">
                    {t.branchPhoneLabel}
                  </p>
                  <a
                    href={`tel:${activeBranch.phone}`}
                    className="text-xs sm:text-sm font-bold text-emerald-700 hover:underline mt-0.5 block"
                  >
                    {activeBranch.phone}
                  </a>
                </div>
              </div>

              <div className="flex items-start gap-2 sm:gap-3 bg-slate-50 py-5 px-2.5 rounded-2xl border border-slate-100">
                <MessageCircle className="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" />
                <div>
                  <p className="text-xs font-bold text-slate-500 uppercase tracking-wider">
                    WhatsApp:
                  </p>
                  <a
                    href={`https://wa.me/${activeBranch.whatsapp.replace(/\D/g, '')}`}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="text-xs sm:text-sm font-bold text-emerald-700 hover:underline mt-0.5 block"
                  >
                    {activeBranch.whatsapp}
                  </a>
                </div>
              </div>
            </div>

            {/* Equipment / Amenities */}
            <div>
              <p className="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                {t.branchEquipmentLabel}
              </p>
              <div className="flex flex-wrap gap-2">
                {activeBranch.features[lang].map((feat, i) => (
                  <span
                    key={i}
                    className="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-900 border border-emerald-200 text-xs font-bold"
                  >
                    <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600" />
                    <span>{feat}</span>
                  </span>
                ))}
              </div>
            </div>

            {/* CTAs */}
            <div className="flex flex-wrap items-center gap-3 pt-2">
              <button
                onClick={() => openEnrollModal(activeBranch.id)}
                className="flex items-center gap-2 px-5 py-3 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-md shadow-emerald-600/20"
              >
                <Sparkles className="w-4 h-4" />
                <span>Записаться в этот филиал</span>
              </button>

              <a
                href={`https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(
                  activeBranch.address.ru
                )}`}
                target="_blank"
                rel="noopener noreferrer"
                className="flex items-center gap-2 px-4 py-3 rounded-xl text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 transition border border-slate-200"
              >
                <Navigation className="w-4 h-4 text-emerald-600" />
                <span>{t.btnBranchRoute}</span>
                <ExternalLink className="w-3 h-3 text-slate-400" />
              </a>
            </div>
          </div>

          {/* Branch Photo & Map Simulation Column */}
          <div className="lg:col-span-5">
            <div className="relative rounded-2xl overflow-hidden border border-slate-200 shadow-md bg-slate-100">
              {!hideImages ? (
                <img
                  src={activeBranch.image}
                  alt={activeBranch.name[lang]}
                  className="w-full h-[360px] object-cover"
                />
              ) : (
                <div className="w-full h-[360px] bg-slate-800 text-slate-200 flex flex-col items-center justify-center p-6 text-center">
                  <Building2 className="w-12 h-12 text-emerald-400 mb-2" />
                  <p className="font-bold text-base">{activeBranch.name[lang]}</p>
                </div>
              )}

              {/* Map Badge */}
              <div className="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md p-3.5 rounded-xl border border-slate-100 shadow-sm flex items-center justify-between">
                <div className="flex items-center gap-2.5">
                  <div className="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs">
                    <MapPin className="w-4 h-4" />
                  </div>
                  <div className="text-left">
                    <p className="text-xs font-bold text-slate-900">{activeBranch.address[lang]}</p>
                    <p className="text-[10px] text-slate-500">г. Астана</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};
