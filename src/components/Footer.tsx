import React from 'react';
import { Link } from 'react-router-dom';
import { useAccessibility } from '../context/AccessibilityContext';
import { BRANCHES } from '../data/mockData';
import logoImg from '../assets/images/regenerated_image_1785993330916.png';
import { Heart, MapPin, Phone, MessageCircle, Mail, Globe, Eye, ArrowUp } from 'lucide-react';

export const Footer: React.FC = () => {
  const { lang, t, isImpairedMode, setIsImpairedMode, openEnrollModal, openDonationModal } = useAccessibility();

  const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  return (
    <footer className="bg-emerald-950 text-emerald-100 pt-16 pb-8 border-t border-emerald-900">
      <div className="max-w-7xl mx-auto px-4">
        {/* Top Footer Grid */}
        <div className="flex flex-wrap xl:flex-nowrap justify-between gap-8 pb-12 border-b border-emerald-900/80">
          {/* Col 1: Foundation Info */}
          <div className="w-full xl:w-[300px] xl:max-w-[300px] flex flex-col gap-4 flex-shrink-0">
            <Link to="/" className="flex items-center gap-3">
              <div className="w-10 h-10 rounded-2xl bg-white p-0.5 flex items-center justify-center overflow-hidden shadow-sm">
                <img src={logoImg} alt="EREKSHE ANALAR Logo" className="w-full h-full object-contain" />
              </div>
              <span className="font-extrabold text-xl text-white tracking-tight">
                EREKSHE ANALAR
              </span>
            </Link>
            <p className="text-xs text-emerald-200/80 leading-relaxed">
              {lang === 'ru'
                ? 'Общественный фонд и сеть реабилитационных центров для детей с особыми образовательными потребностями и комплексной поддержки матерей в городе Астана.'
                : 'Астана қаласындағы ерекше білім беру қажеттіліктері бар балаларға арналған оңалту орталықтары желісі және аналарды кешенді қолдау қоры.'}
            </p>

            <div className="flex items-center gap-3 pt-2">
              <button
                onClick={() => setIsImpairedMode(!isImpairedMode)}
                className="flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-bold bg-emerald-900/80 hover:bg-emerald-800 text-emerald-100 border border-emerald-700 transition cursor-pointer"
              >
                <Eye className="w-4 h-4 text-amber-400" />
                <span>{isImpairedMode ? 'Обычный режим' : 'Версия для слабовидящих'}</span>
              </button>
            </div>
          </div>

          {/* Col 2: Navigation Links */}
          <div className="w-full sm:w-auto flex flex-col gap-3 flex-shrink-0">
            <h4 className="text-sm font-bold text-white uppercase tracking-wider mb-1">
              {lang === 'ru' ? 'Навигация' : 'Навигация'}
            </h4>
            <ul className="flex flex-col gap-2 text-xs font-medium text-emerald-200/80">
              <li><Link to="/" className="hover:text-amber-300 transition">{lang === 'ru' ? 'Главная' : 'Басты бет'}</Link></li>
              <li><Link to="/about" className="hover:text-amber-300 transition">{t.navAbout}</Link></li>
              <li><Link to="/services" className="hover:text-amber-300 transition">{t.navServices}</Link></li>
              <li><Link to="/process" className="hover:text-amber-300 transition">{t.navProcess}</Link></li>
              <li><Link to="/branches" className="hover:text-amber-300 transition">{t.navBranches}</Link></li>
              <li><Link to="/team" className="hover:text-amber-300 transition">{t.navTeam}</Link></li>
              <li><Link to="/umay" className="hover:text-amber-300 transition">{t.navUmay}</Link></li>
              <li><Link to="/charity" className="hover:text-amber-300 transition">{t.navCharity}</Link></li>
              <li><Link to="/documents" className="hover:text-amber-300 transition">{t.navDocuments}</Link></li>
              <li><Link to="/news" className="hover:text-amber-300 transition">{t.navNews}</Link></li>
              <li><Link to="/contacts" className="hover:text-amber-300 transition">{t.navContacts}</Link></li>
            </ul>
          </div>

          {/* Col 3: Services Menu */}
          <div className="w-full sm:w-auto flex flex-col gap-3 flex-1 min-w-[200px]">
            <h4 className="text-sm font-bold text-white uppercase tracking-wider mb-1">
              {lang === 'ru' ? 'Наши услуги' : 'Біздің қызметтер'}
            </h4>
            <ul className="flex flex-col gap-2 text-xs font-medium text-emerald-200/80">
              {[
                { ru: 'Логопедическая коррекция и развитие речи', kk: 'Логопедиялық түзету және сөйлеуді дамыту' },
                { ru: 'Психологическая коррекция и развитие', kk: 'Психологиялық түзету және дамыту' },
                { ru: 'Дефектологическая коррекция и развитие', kk: 'Дефектологиялық түзету және дамыту' },
                { ru: 'ЛФК / АФК', kk: 'ЕФК / ЕАФК' },
                { ru: 'Физиотерапия', kk: 'Физиотерапия' },
                { ru: 'Массаж', kk: 'Массаж' },
                { ru: 'Гидротерапия и водные процедуры', kk: 'Гидротерапия және су процедуралары' },
                { ru: 'Социально-бытовая адаптация', kk: 'Әлеуметтік-тұрмыстық бейімделу' },
              ].map((s, i) => (
                <li key={i}>
                  <Link to="/services" className="hover:text-amber-300 transition flex items-center gap-1.5">
                    <span className="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    {lang === 'ru' ? s.ru : s.kk}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Col 4: 4 Branches List */}
          <div className="w-full xl:w-[400px] xl:max-w-[400px] flex flex-col gap-3 flex-shrink-0">
            <h4 className="text-sm font-bold text-white uppercase tracking-wider mb-1">
              {t.branchesTitle} (Астана)
            </h4>
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
              {BRANCHES.map((b) => (
                <Link key={b.id} to="/branches" className="bg-emerald-900/60 p-3 rounded-xl border border-emerald-800/80 hover:border-amber-400 transition group">
                  <p className="font-bold text-white group-hover:text-amber-300 transition">{b.name[lang]}</p>
                  <p className="text-[11px] text-emerald-200/70 mt-1 flex items-center gap-1">
                    <MapPin className="w-3 h-3 text-emerald-400 flex-shrink-0" />
                    <span>{b.address[lang]}</span>
                  </p>
                </Link>
              ))}
            </div>
          </div>
        </div>

        {/* Bottom Bar */}
        <div className="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-emerald-300/70 font-medium">
          <p>© 2026 {t.foundationName}. {t.footerRights}</p>

          <div className="flex items-center gap-4">
            <button
              onClick={scrollToTop}
              className="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-900 hover:bg-emerald-800 text-emerald-100 border border-emerald-800 transition cursor-pointer"
            >
              <span>Наверх</span>
              <ArrowUp className="w-3.5 h-3.5" />
            </button>
          </div>
        </div>
      </div>
    </footer>
  );
};
