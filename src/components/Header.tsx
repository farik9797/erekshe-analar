import React, { useState, useEffect } from 'react';
import { Link, NavLink } from 'react-router-dom';
import { useAccessibility } from '../context/AccessibilityContext';
import { SearchModal } from './SearchModal';
import logoImg from '../assets/images/regenerated_image_1785993330916.png';
import {
  Phone,
  Eye,
  Clock,
  MapPin,
  Menu,
  X,
  HeartHandshake,
  Heart,
  Sparkles,
  ChevronRight,
  Search,
  Instagram
} from 'lucide-react';

export const Header: React.FC = () => {
  const {
    lang,
    setLang,
    t,
    isImpairedMode,
    setIsImpairedMode,
    openEnrollModal,
    openDonationModal
  } = useAccessibility();

  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const [isSearchOpen, setIsSearchOpen] = useState(false);

  // Global Ctrl+K / Cmd+K listener
  useEffect(() => {
    const handleKeyDown = (e: KeyboardEvent) => {
      if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
        e.preventDefault();
        setIsSearchOpen((prev) => !prev);
      }
    };
    window.addEventListener('keydown', handleKeyDown);
    return () => window.removeEventListener('keydown', handleKeyDown);
  }, []);

  const navLinks = [
    { to: '/', label: lang === 'ru' ? 'Главная' : 'Басты бет' },
    { to: '/about', label: t.navAbout },
    { to: '/services', label: t.navServices },
    { to: '/process', label: t.navProcess },
    { to: '/branches', label: t.navBranches },
    { to: '/team', label: t.navTeam },
    { to: '/umay', label: t.navUmay },
    { to: '/charity', label: t.navCharity },
    { to: '/documents', label: t.navDocuments },
    { to: '/news', label: t.navNews },
    { to: '/reviews-faq', label: t.navReviews },
    { to: '/contacts', label: t.navContacts }
  ];

  return (
    <header className="w-full bg-white border-b border-slate-100 shadow-xs sticky top-0 z-40 transition-all">
      {/* Top Bar */}
      <div className="bg-slate-900 text-slate-200 text-xs py-2 px-4 border-b border-slate-800">
        <div className="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
          {/* Left info — на мобильном во всю ширину: город слева, телефон справа */}
          <div className="flex flex-wrap items-center gap-4 w-full justify-between sm:w-auto sm:justify-normal">
            <Link to="/branches" className="flex items-center gap-1.5 text-emerald-400 hover:text-emerald-300 font-semibold transition">
              <MapPin className="w-3.5 h-3.5" />
              {t.astanaCity} (4 филиала)
            </Link>
            <span className="hidden md:flex items-center gap-1.5 text-slate-400">
              <Clock className="w-3.5 h-3.5 text-slate-400" />
              {t.workingHours}
            </span>
            <a
              href="tel:+77172708090"
              className="flex items-center gap-1 text-slate-200 hover:text-emerald-400 font-semibold transition"
            >
              <Phone className="w-3.5 h-3.5 text-emerald-400" />
              +7 (7172) 70-80-90
            </a>
          </div>

          {/* Right actions — на мобильном во всю ширину: АА слева, соцсети по центру, язык справа */}
          <div className="flex items-center gap-2.5 w-full justify-between sm:w-auto sm:justify-normal">
            {/* Visually Impaired Toggle Button */}
            <button
              onClick={() => setIsImpairedMode(!isImpairedMode)}
              className={`flex items-center gap-1.5 px-2.5 py-1 rounded text-xs font-semibold transition border cursor-pointer ${
                isImpairedMode
                  ? 'bg-amber-400 text-slate-950 border-amber-300'
                  : 'bg-slate-800 text-slate-200 hover:bg-slate-700 border-slate-700 hover:border-emerald-500'
              }`}
              title={t.visuallyImpairedVersion}
            >
              <Eye className="w-3.5 h-3.5 text-amber-400" />
              <span className="hidden sm:inline">{t.visuallyImpairedVersion}</span>
              <span className="sm:hidden">АА</span>
            </button>

            {/* Language Selector Switcher */}
            <div className="order-3 sm:order-2 flex items-center bg-slate-800 rounded p-0.5 border border-slate-700">
              <button
                onClick={() => setLang('ru')}
                className={`px-2 py-0.5 rounded text-[11px] font-bold transition cursor-pointer ${
                  lang === 'ru' ? 'bg-emerald-600 text-white shadow-xs' : 'text-slate-400 hover:text-white'
                }`}
              >
                RU
              </button>
              <button
                onClick={() => setLang('kk')}
                className={`px-2 py-0.5 rounded text-[11px] font-bold transition cursor-pointer ${
                  lang === 'kk' ? 'bg-emerald-600 text-white shadow-xs' : 'text-slate-400 hover:text-white'
                }`}
              >
                ҚАЗ
              </button>
            </div>

            {/* Social Media Links */}
            <div className="order-2 sm:order-3 flex items-center gap-1.5 sm:ml-1">
              <a
                href="https://wa.me/77084251212"
                target="_blank"
                rel="noopener noreferrer"
                className="w-6 h-6 rounded-lg bg-transparent hover:opacity-90 transition-all duration-200 flex items-center justify-center hover:scale-110 cursor-pointer overflow-hidden"
                title="WhatsApp"
                aria-label="WhatsApp"
              >
                <img
                  src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/960px-WhatsApp.svg.png"
                  alt="WhatsApp"
                  className="w-full h-full object-contain"
                  referrerPolicy="no-referrer"
                />
              </a>
              <a
                href="https://instagram.com/erekshe_analar"
                target="_blank"
                rel="noopener noreferrer"
                className="w-6 h-6 rounded-lg bg-gradient-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] text-white hover:opacity-90 transition-all duration-200 flex items-center justify-center shadow-xs hover:scale-105 cursor-pointer"
                title="Instagram"
                aria-label="Instagram"
              >
                <Instagram className="w-3.5 h-3.5" />
              </a>
            </div>
          </div>
        </div>
      </div>

      {/* Row 2: Main Header Container with Search */}
      <div className="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between gap-3 sm:gap-4">
        {/* Foundation Logo & Branding */}
        <Link to="/" className="flex items-center gap-3 group flex-shrink-0">
          <div className="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-white p-0.5 border border-slate-200/80 shadow-md shadow-emerald-600/10 group-hover:scale-105 transition-transform flex items-center justify-center overflow-hidden">
            <img src={logoImg} alt="EREKSHE ANALAR Logo" className="w-full h-full object-contain" />
          </div>
          <div className="flex flex-col">
            <div className="flex items-center gap-1.5">
              <span className="font-extrabold text-base sm:text-lg md:text-xl text-slate-900 tracking-tight leading-none group-hover:text-emerald-700 transition-colors">
                EREKSHE ANALAR
              </span>
            </div>
            <span className="text-[11px] text-slate-500 font-medium tracking-normal mt-0.5 hidden md:block">
              {lang === 'ru' ? 'Общественный фонд и реабилитационные центры' : 'Қоғамдық қор және оңалту орталықтары'}
            </span>
          </div>
        </Link>

        {/* Search Bar in Row 2 (Replacing Nav) — скрыт на мобильном, доступен в drawer-меню */}
        <div className="hidden sm:block flex-1 max-w-md mx-1 sm:mx-4">
          <button
            onClick={() => setIsSearchOpen(true)}
            className="w-full flex items-center justify-between gap-2 px-3 sm:px-4 py-2 rounded-xl bg-slate-100/90 hover:bg-slate-200/80 border border-slate-200 text-slate-500 hover:text-slate-800 text-xs transition shadow-2xs group cursor-pointer"
          >
            <div className="flex items-center gap-2 overflow-hidden">
              <Search className="w-4 h-4 text-emerald-600 flex-shrink-0 group-hover:scale-110 transition-transform" />
              <span className="truncate text-slate-600">{lang === 'ru' ? 'Поиск по сайту...' : 'Сайттан іздеу...'}</span>
            </div>
          </button>
        </div>

        {/* Header Action Buttons — на десктопе (рядом с навигацией); на планшете/мобильном они в drawer-меню */}
        <div className="hidden lg:flex items-center gap-2 flex-shrink-0">
          <button
            onClick={openDonationModal}
            className="flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 hover:bg-emerald-100 hover:border-emerald-300 transition shadow-xs cursor-pointer"
          >
            <HeartHandshake className="w-4 h-4 text-emerald-600" />
            <span className="hidden md:inline">{t.btnSupport}</span>
            <span className="md:hidden">{lang === 'ru' ? 'Помочь' : 'Көмек'}</span>
          </button>

          <button
            onClick={() => openEnrollModal()}
            className="flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-md shadow-emerald-600/20 transition hover:scale-[1.02] active:scale-[0.98] cursor-pointer"
          >
            <Sparkles className="w-4 h-4" />
            <span>{t.btnEnroll}</span>
          </button>
        </div>

        {/* Mobile Menu Toggle Button */}
        <button
          onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
          className="lg:hidden p-2 rounded-xl text-slate-700 hover:bg-slate-100 transition cursor-pointer flex-shrink-0"
          aria-label="Toggle Navigation Menu"
        >
          {mobileMenuOpen ? <X className="w-6 h-6 text-emerald-700" /> : <Menu className="w-6 h-6 text-slate-700" />}
        </button>
      </div>

      {/* Row 3: Dedicated Navigation Bar */}
      <div className="hidden lg:block bg-slate-50/90 border-t border-slate-100">
        <div className="max-w-7xl mx-auto px-4 py-1.5">
          <nav className="flex items-center justify-between gap-0.5 xl:gap-1 text-xs font-semibold text-slate-700">
            {navLinks.map((link) => (
              <NavLink
                key={link.to}
                to={link.to}
                className={({ isActive }) =>
                  `px-2 xl:px-3 py-1.5 rounded-lg whitespace-nowrap transition ${
                    isActive
                      ? 'bg-emerald-600 text-white font-bold shadow-xs'
                      : 'hover:bg-emerald-100/80 hover:text-emerald-800 text-slate-700'
                  }`
                }
              >
                {link.label}
              </NavLink>
            ))}
          </nav>
        </div>
      </div>

      {/* Mobile Drawer Menu */}
      {mobileMenuOpen && (
        <div className="lg:hidden bg-white border-t border-slate-100 shadow-xl px-4 pt-3 pb-6 animate-fadeIn">
          <div className="grid grid-cols-2 gap-2 mb-4">
            {navLinks.map((link) => (
              <NavLink
                key={link.to}
                to={link.to}
                onClick={() => setMobileMenuOpen(false)}
                className={({ isActive }) =>
                  `px-3 py-2.5 rounded-lg text-xs font-semibold flex items-center justify-between border transition ${
                    isActive
                      ? 'bg-emerald-600 text-white border-emerald-600 font-bold'
                      : 'bg-slate-50 hover:bg-emerald-50 hover:text-emerald-700 text-slate-700 border-slate-100'
                  }`
                }
              >
                <span>{link.label}</span>
                <ChevronRight className="w-3.5 h-3.5 opacity-60" />
              </NavLink>
            ))}
          </div>

          <div className="flex flex-col gap-2 pt-3 border-t border-slate-100">
            <button
              onClick={() => {
                setMobileMenuOpen(false);
                openEnrollModal();
              }}
              className="w-full py-3 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 flex items-center justify-center gap-2 shadow-md shadow-emerald-600/20 active:scale-[0.98] transition cursor-pointer"
            >
              <Sparkles className="w-4 h-4" />
              <span>{t.btnEnroll}</span>
            </button>

            <a
              href="tel:+77172708090"
              className="w-full py-2.5 px-3 rounded-xl text-xs font-bold text-slate-800 bg-slate-100 hover:bg-slate-200 border border-slate-200 flex items-center justify-center gap-2 transition"
            >
              <Phone className="w-3.5 h-3.5 text-emerald-600" />
              <span>+7 (7172) 70-80-90</span>
            </a>

            <button
              onClick={() => {
                setMobileMenuOpen(false);
                setIsSearchOpen(true);
              }}
              className="w-full py-2.5 rounded-xl text-xs font-bold text-slate-700 bg-slate-50 hover:bg-slate-100 border border-slate-200 flex items-center justify-center gap-2 cursor-pointer transition"
            >
              <Search className="w-4 h-4 text-emerald-600" />
              <span>{lang === 'ru' ? 'Поиск по сайту' : 'Сайттан іздеу'}</span>
            </button>

            <button
              onClick={() => {
                setMobileMenuOpen(false);
                openDonationModal();
              }}
              className="w-full py-2.5 rounded-xl text-xs font-bold text-amber-900 bg-amber-50 hover:bg-amber-100 border border-amber-200 flex items-center justify-center gap-2 transition cursor-pointer"
            >
              <HeartHandshake className="w-4 h-4 text-amber-600" />
              <span>{t.btnSupport}</span>
            </button>
          </div>
        </div>
      )}

      <SearchModal isOpen={isSearchOpen} onClose={() => setIsSearchOpen(false)} />
    </header>
  );
};
