import React, { useState, useEffect, useRef } from 'react';
import { useNavigate } from 'react-router-dom';
import { useAccessibility } from '../context/AccessibilityContext';
import {
  SERVICES,
  NEWS,
  DOCUMENTS,
  BRANCHES,
  SPECIALISTS,
  FAQS
} from '../data/mockData';
import { ServiceItem, NewsItem, DocumentItem, Branch, Specialist, FaqItem } from '../types';
import {
  Search,
  X,
  Sparkles,
  Activity,
  Newspaper,
  FileText,
  MapPin,
  User,
  HelpCircle,
  ArrowRight,
  Filter
} from 'lucide-react';

type SearchCategory = 'all' | 'services' | 'news' | 'documents' | 'branches' | 'specialists' | 'faq';

interface SearchResultItem {
  id: string;
  type: 'service' | 'news' | 'document' | 'branch' | 'specialist' | 'faq';
  title: string;
  description: string;
  badge: string;
  link?: string;
  action?: () => void;
  rawItem: ServiceItem | NewsItem | DocumentItem | Branch | Specialist | FaqItem;
}

interface SearchModalProps {
  isOpen: boolean;
  onClose: () => void;
}

export const SearchModal: React.FC<SearchModalProps> = ({ isOpen, onClose }) => {
  const { lang, t, isImpairedMode, openServiceModal } = useAccessibility();
  const navigate = useNavigate();

  const [query, setQuery] = useState('');
  const [activeCategory, setActiveCategory] = useState<SearchCategory>('all');
  const inputRef = useRef<HTMLInputElement>(null);

  // Focus input when modal opens
  useEffect(() => {
    if (isOpen) {
      setTimeout(() => {
        inputRef.current?.focus();
      }, 100);
    } else {
      setQuery('');
      setActiveCategory('all');
    }
  }, [isOpen]);

  // Handle ESC key
  useEffect(() => {
    const handleKeyDown = (e: KeyboardEvent) => {
      if (e.key === 'Escape' && isOpen) {
        onClose();
      }
    };
    window.addEventListener('keydown', handleKeyDown);
    return () => window.removeEventListener('keydown', handleKeyDown);
  }, [isOpen, onClose]);

  if (!isOpen) return null;

  const popularQueries = [
    { label: 'Логопед', query: 'логопед' },
    { label: 'Бассейн', query: 'бассейн' },
    { label: 'Сарыарка', query: 'сарыарка' },
    { label: 'Галокамера', query: 'галокамера' },
    { label: 'ПМПК / Документы', query: 'ПМПК' },
    { label: 'ЛФК и АФК', query: 'ЛФК' },
    { label: 'Центр UMAY', query: 'UMAY' },
    { label: 'Дефектолог', query: 'дефектолог' }
  ];

  // Perform search across all entities
  const q = query.trim().toLowerCase();

  const results: SearchResultItem[] = [];

  if (q.length > 0) {
    // 1. Search Services
    if (activeCategory === 'all' || activeCategory === 'services') {
      SERVICES.forEach((service) => {
        const titleRu = service.title.ru.toLowerCase();
        const titleKk = service.title.kk.toLowerCase();
        const descRu = service.shortDesc.ru.toLowerCase() + ' ' + service.fullDesc.ru.toLowerCase();
        const descKk = service.shortDesc.kk.toLowerCase() + ' ' + service.fullDesc.kk.toLowerCase();
        const indications = (service.indications.ru.join(' ') + ' ' + service.indications.kk.join(' ')).toLowerCase();

        if (
          titleRu.includes(q) ||
          titleKk.includes(q) ||
          descRu.includes(q) ||
          descKk.includes(q) ||
          indications.includes(q)
        ) {
          results.push({
            id: `service-${service.id}`,
            type: 'service',
            title: service.title[lang],
            description: service.shortDesc[lang],
            badge: lang === 'ru' ? 'Услуга' : 'Қызмет',
            action: () => {
              onClose();
              openServiceModal(service);
            },
            rawItem: service
          });
        }
      });
    }

    // 2. Search Branches
    if (activeCategory === 'all' || activeCategory === 'branches') {
      BRANCHES.forEach((branch) => {
        const nameRu = branch.name.ru.toLowerCase();
        const nameKk = branch.name.kk.toLowerCase();
        const addrRu = branch.address.ru.toLowerCase();
        const addrKk = branch.address.kk.toLowerCase();
        const features = (branch.features.ru.join(' ') + ' ' + branch.features.kk.join(' ')).toLowerCase();

        if (
          nameRu.includes(q) ||
          nameKk.includes(q) ||
          addrRu.includes(q) ||
          addrKk.includes(q) ||
          features.includes(q)
        ) {
          results.push({
            id: `branch-${branch.id}`,
            type: 'branch',
            title: branch.name[lang],
            description: `${branch.address[lang]} • ${branch.district[lang]}`,
            badge: lang === 'ru' ? 'Филиал' : 'Филиал',
            action: () => {
              onClose();
              navigate('/branches');
            },
            rawItem: branch
          });
        }
      });
    }

    // 3. Search News
    if (activeCategory === 'all' || activeCategory === 'news') {
      NEWS.forEach((newsItem) => {
        const titleRu = newsItem.title.ru.toLowerCase();
        const titleKk = newsItem.title.kk.toLowerCase();
        const sumRu = newsItem.summary.ru.toLowerCase();
        const sumKk = newsItem.summary.kk.toLowerCase();

        if (titleRu.includes(q) || titleKk.includes(q) || sumRu.includes(q) || sumKk.includes(q)) {
          results.push({
            id: `news-${newsItem.id}`,
            type: 'news',
            title: newsItem.title[lang],
            description: `${newsItem.date} — ${newsItem.summary[lang]}`,
            badge: lang === 'ru' ? 'Новость' : 'Жаңалық',
            action: () => {
              onClose();
              navigate('/news');
            },
            rawItem: newsItem
          });
        }
      });
    }

    // 4. Search Documents
    if (activeCategory === 'all' || activeCategory === 'documents') {
      DOCUMENTS.forEach((doc) => {
        const titleRu = doc.title.ru.toLowerCase();
        const titleKk = doc.title.kk.toLowerCase();
        const catRu = doc.category.ru.toLowerCase();
        const catKk = doc.category.kk.toLowerCase();

        if (titleRu.includes(q) || titleKk.includes(q) || catRu.includes(q) || catKk.includes(q)) {
          results.push({
            id: `doc-${doc.id}`,
            type: 'document',
            title: doc.title[lang],
            description: `${doc.category[lang]} (${doc.fileSize})`,
            badge: lang === 'ru' ? 'Документ' : 'Құжат',
            action: () => {
              onClose();
              navigate('/documents');
            },
            rawItem: doc
          });
        }
      });
    }

    // 5. Search Specialists / Team
    if (activeCategory === 'all' || activeCategory === 'specialists') {
      SPECIALISTS.forEach((spec) => {
        const nameRu = spec.name.ru.toLowerCase();
        const nameKk = spec.name.kk.toLowerCase();
        const roleRu = spec.role.ru.toLowerCase();
        const roleKk = spec.role.kk.toLowerCase();
        const bioRu = spec.bio.ru.toLowerCase();

        if (nameRu.includes(q) || nameKk.includes(q) || roleRu.includes(q) || roleKk.includes(q) || bioRu.includes(q)) {
          results.push({
            id: `spec-${spec.id}`,
            type: 'specialist',
            title: spec.name[lang],
            description: spec.role[lang],
            badge: lang === 'ru' ? 'Специалист' : 'Маман',
            action: () => {
              onClose();
              navigate('/team');
            },
            rawItem: spec
          });
        }
      });
    }

    // 6. Search FAQs
    if (activeCategory === 'all' || activeCategory === 'faq') {
      FAQS.forEach((faq) => {
        const qRu = faq.question.ru.toLowerCase();
        const qKk = faq.question.kk.toLowerCase();
        const aRu = faq.answer.ru.toLowerCase();
        const aKk = faq.answer.kk.toLowerCase();

        if (qRu.includes(q) || qKk.includes(q) || aRu.includes(q) || aKk.includes(q)) {
          results.push({
            id: `faq-${faq.id}`,
            type: 'faq',
            title: faq.question[lang],
            description: faq.answer[lang],
            badge: 'FAQ',
            action: () => {
              onClose();
              navigate('/reviews-faq');
            },
            rawItem: faq
          });
        }
      });
    }
  }

  const getItemIcon = (type: SearchResultItem['type']) => {
    switch (type) {
      case 'service':
        return <Activity className="w-4 h-4 text-emerald-600" />;
      case 'branch':
        return <MapPin className="w-4 h-4 text-teal-600" />;
      case 'news':
        return <Newspaper className="w-4 h-4 text-blue-600" />;
      case 'document':
        return <FileText className="w-4 h-4 text-amber-600" />;
      case 'specialist':
        return <User className="w-4 h-4 text-purple-600" />;
      case 'faq':
        return <HelpCircle className="w-4 h-4 text-rose-600" />;
      default:
        return <Search className="w-4 h-4 text-slate-500" />;
    }
  };

  const categories = [
    { key: 'all', label: lang === 'ru' ? 'Все результаты' : 'Барлық нәтижелер' },
    { key: 'services', label: lang === 'ru' ? 'Услуги' : 'Қызметтер' },
    { key: 'branches', label: lang === 'ru' ? 'Филиалы' : 'Филиалдар' },
    { key: 'news', label: lang === 'ru' ? 'Новости' : 'Жаңалықтар' },
    { key: 'documents', label: lang === 'ru' ? 'Документы' : 'Құжаттар' },
    { key: 'specialists', label: lang === 'ru' ? 'Специалисты' : 'Мамандар' },
    { key: 'faq', label: 'FAQ' }
  ];

  return (
    <div className="fixed inset-0 z-50 flex items-start justify-center pt-4 sm:pt-16 px-3 sm:px-4 bg-slate-950/70 backdrop-blur-sm animate-fadeIn">
      <div
        className={`w-full max-w-3xl max-h-[92vh] flex flex-col bg-white rounded-3xl shadow-2xl overflow-hidden border ${
          isImpairedMode ? 'border-amber-400 bg-amber-50' : 'border-slate-100'
        }`}
      >
        {/* Search Header Input */}
        <div className="p-4 sm:p-5 border-b border-slate-100 bg-slate-50/80 flex items-center gap-3">
          <div className="w-10 h-10 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center flex-shrink-0">
            <Search className="w-5 h-5" />
          </div>
          <input
            ref={inputRef}
            type="text"
            value={query}
            onChange={(e) => setQuery(e.target.value)}
            placeholder={
              lang === 'ru'
                ? 'Поиск услуг, филиалов, новостей, документов...'
                : 'Қызметтерді, филиалдарды, жаңалықтарды іздеу...'
            }
            className="w-full text-sm sm:text-base font-medium text-slate-900 bg-transparent outline-none placeholder:text-slate-400"
          />
          {query && (
            <button
              onClick={() => setQuery('')}
              className="p-2 rounded-xl text-slate-400 hover:text-slate-700 hover:bg-slate-200/60 transition cursor-pointer"
            >
              <X className="w-4 h-4" />
            </button>
          )}
          <button
            onClick={onClose}
            className="px-3 py-1.5 rounded-xl text-xs font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-100 transition flex items-center gap-1.5 cursor-pointer flex-shrink-0"
          >
            <span>ESC</span>
          </button>
        </div>

        {/* Category Filters Bar */}
        {query.trim().length > 0 && (
          <div className="px-4 py-2 bg-slate-100/70 border-b border-slate-200/60 flex items-center gap-2 overflow-x-auto text-xs font-semibold">
            <Filter className="w-3.5 h-3.5 text-slate-400 flex-shrink-0" />
            {categories.map((cat) => (
              <button
                key={cat.key}
                onClick={() => setActiveCategory(cat.key as SearchCategory)}
                className={`px-3 py-1 rounded-full whitespace-nowrap transition cursor-pointer ${
                  activeCategory === cat.key
                    ? 'bg-emerald-600 text-white font-bold shadow-xs'
                    : 'bg-white text-slate-600 hover:bg-slate-200'
                }`}
              >
                {cat.label}
              </button>
            ))}
          </div>
        )}

        {/* Content Body */}
        <div className="max-h-[60vh] overflow-y-auto p-4 sm:p-6 space-y-3">
          {/* Default state when empty query */}
          {query.trim().length === 0 && (
            <div className="space-y-6 py-2">
              <div>
                <p className="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">
                  {lang === 'ru' ? 'Популярные запросы' : 'Танымал сұраныстар'}
                </p>
                <div className="flex flex-wrap gap-2">
                  {popularQueries.map((item) => (
                    <button
                      key={item.label}
                      onClick={() => setQuery(item.query)}
                      className="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-emerald-50 hover:text-emerald-800 text-slate-700 text-xs font-semibold border border-slate-200/80 transition flex items-center gap-1.5 cursor-pointer"
                    >
                      <Sparkles className="w-3.5 h-3.5 text-emerald-600" />
                      <span>{item.label}</span>
                    </button>
                  ))}
                </div>
              </div>

              <div className="bg-emerald-50/60 border border-emerald-100 rounded-2xl p-4 flex items-start gap-3">
                <div className="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold flex-shrink-0 mt-0.5">
                  <Search className="w-4 h-4" />
                </div>
                <div>
                  <p className="text-xs font-bold text-emerald-950 mb-1">
                    {lang === 'ru' ? 'Быстрый поиск по всему порталу' : 'Портал бойынша жылдам іздеу'}
                  </p>
                  <p className="text-xs text-emerald-800 leading-relaxed">
                    {lang === 'ru'
                      ? 'Вводите название процедуры, диагноз, адрес филиала или тему вопроса (например, логомассаж, ДЦП, ПМПК, Сарыарка).'
                      : 'Процедура атауын, диагнозды, филиал мекенжайын немесе сұрақ тақырыбын енгізіңіз.'}
                  </p>
                </div>
              </div>
            </div>
          )}

          {/* Results count */}
          {query.trim().length > 0 && (
            <div className="flex items-center justify-between text-xs font-semibold text-slate-500 pb-1 border-b border-slate-100">
              <span>
                {lang === 'ru' ? 'Результаты поиска' : 'Іздеу нәтижелері'}: {results.length}
              </span>
              <span>
                {lang === 'ru' ? 'Нажмите на элемент для перехода' : 'Өту үшін элементті басыңыз'}
              </span>
            </div>
          )}

          {/* Search Result List */}
          {query.trim().length > 0 && results.length > 0 && (
            <div className="space-y-2">
              {results.map((res) => (
                <div
                  key={res.id}
                  onClick={res.action}
                  className="group p-3.5 rounded-2xl bg-slate-50 hover:bg-emerald-50/80 border border-slate-100 hover:border-emerald-200 transition cursor-pointer flex items-start justify-between gap-3"
                >
                  <div className="flex items-start gap-3">
                    <div className="p-2 rounded-xl bg-white border border-slate-200/80 shadow-xs group-hover:bg-emerald-100 transition mt-0.5">
                      {getItemIcon(res.type)}
                    </div>
                    <div>
                      <div className="flex items-center gap-2 mb-1">
                        <span className="text-xs font-extrabold px-2 py-0.5 rounded bg-slate-200 text-slate-700 group-hover:bg-emerald-200 group-hover:text-emerald-900 transition">
                          {res.badge}
                        </span>
                        <h4 className="text-xs sm:text-sm font-bold text-slate-900 group-hover:text-emerald-900 transition">
                          {res.title}
                        </h4>
                      </div>
                      <p className="text-xs text-slate-600 line-clamp-2 leading-relaxed">
                        {res.description}
                      </p>
                    </div>
                  </div>

                  <div className="self-center text-slate-400 group-hover:text-emerald-700 transition transform group-hover:translate-x-1">
                    <ArrowRight className="w-4 h-4" />
                  </div>
                </div>
              ))}
            </div>
          )}

          {/* No results state */}
          {query.trim().length > 0 && results.length === 0 && (
            <div className="text-center py-12 px-4 space-y-3">
              <div className="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center mx-auto font-bold">
                <Search className="w-6 h-6" />
              </div>
              <h3 className="text-sm sm:text-base font-extrabold text-slate-900">
                {lang === 'ru' ? 'Ничего не найдено' : 'Ештеңе табылмады'}
              </h3>
              <p className="text-xs text-slate-500 max-w-sm mx-auto">
                {lang === 'ru'
                  ? `По запросу «${query}» ничего не найдено. Попробуйте изменить формулировку или выбрать из популярных вариантов.`
                  : `«${query}» сұранысы бойынша ештеңе табылмады.`}
              </p>
            </div>
          )}
        </div>

        {/* Modal Footer */}
        <div className="px-6 py-3 bg-slate-100/80 border-t border-slate-200/60 flex items-center justify-between text-[11px] font-semibold text-slate-500">
          <div className="flex items-center gap-2">
            <kbd className="px-1.5 py-0.5 bg-white border border-slate-300 rounded shadow-2xs font-mono text-slate-700">
              ESC
            </kbd>
            <span>{lang === 'ru' ? 'закрыть' : 'жабу'}</span>
          </div>
          <span>
            {lang === 'ru'
              ? 'Общественный фонд EREKSHE ANALAR'
              : 'EREKSHE ANALAR қоғамдық қоры'}
          </span>
        </div>
      </div>
    </div>
  );
};
