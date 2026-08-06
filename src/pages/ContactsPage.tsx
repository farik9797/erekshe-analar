import React from 'react';
import { ContactSection } from '../components/ContactSection';
import { BranchesSection } from '../components/BranchesSection';
import { useAccessibility } from '../context/AccessibilityContext';
import { FadeIn } from '../components/FadeIn';
import { Phone, MapPin, Clock, MessageCircle, Mail } from 'lucide-react';

export const ContactsPage: React.FC = () => {
  const { lang, t, openEnrollModal } = useAccessibility();

  return (
    <div className="bg-slate-50 min-h-screen py-10 space-y-12">
      <FadeIn>
        <div className="max-w-7xl mx-auto px-4">
          <div className="bg-gradient-to-r from-emerald-900 via-teal-900 to-slate-900 text-white rounded-3xl p-8 md:p-12 shadow-xl">
            <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
              <Phone className="w-4 h-4" />
              {t.contactsBadge}
            </span>
            <h1 className="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4">
              {t.contactsTitle}
            </h1>
            <p className="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6">
              {t.contactsDesc}
            </p>

            <div className="flex flex-wrap items-center gap-4 text-xs font-semibold">
              <a
                href="tel:+77172708090"
                className="px-4 py-2.5 rounded-xl bg-white text-slate-900 hover:bg-emerald-50 transition flex items-center gap-2"
              >
                <Phone className="w-4 h-4 text-emerald-600" />
                <span>+7 (7172) 70-80-90</span>
              </a>
              <a
                href="https://wa.me/77084251212"
                target="_blank"
                rel="noopener noreferrer"
                className="px-4 py-2.5 rounded-xl bg-emerald-500 text-slate-950 font-bold hover:bg-emerald-400 transition flex items-center gap-2"
              >
                <MessageCircle className="w-4 h-4 fill-slate-950" />
                <span>WhatsApp +7 (708) 425-12-12</span>
              </a>
            </div>
          </div>
        </div>
      </FadeIn>

      <FadeIn>
        <ContactSection />
      </FadeIn>
      <FadeIn>
        <BranchesSection />
      </FadeIn>
    </div>
  );
};
