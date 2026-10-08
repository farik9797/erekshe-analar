import React, { useEffect, useState } from 'react';
import { createPortal } from 'react-dom';
import { useAccessibility } from '../context/AccessibilityContext';
import { BRANCHES } from '../data/mockData';
import { X, Send, MapPin } from 'lucide-react';

// «Что вас интересует?» — один вариант из списка
const TOPICS = [
  { ru: 'Есть ли места в центре?', kk: 'Орталықта орын бар ма?' },
  { ru: 'Хотела бы узнать подробнее о центре', kk: 'Орталық туралы толығырақ білгім келеді' },
  { ru: 'Как попасть в центр?', kk: 'Орталыққа қалай түсуге болады?' },
  { ru: 'Какие документы необходимы?', kk: 'Қандай құжаттар қажет?' },
  { ru: 'Для детей какого возраста принимаете?', kk: 'Қандай жастағы балаларды қабылдайсыздар?' },
  { ru: 'Какие категории детей принимаются?', kk: 'Балалардың қандай санаттары қабылданады?' },
  { ru: 'Подходит ли нашему ребёнку ваш центр?', kk: 'Біздің балаға сіздің орталық қолайлы ма?' },
  { ru: 'Какие условия пребывания в центре?', kk: 'Орталықта болу жағдайлары қандай?' },
  { ru: 'Есть ли питание?', kk: 'Тамақтандыру бар ма?' },
  { ru: 'Есть ли транспорт / доставка ребёнка?', kk: 'Көлік / баланы жеткізу бар ма?' },
  { ru: 'Есть ли в центре платные услуги?', kk: 'Орталықта ақылы қызметтер бар ма?' },
  { ru: 'Какие есть филиалы?', kk: 'Қандай филиалдар бар?' },
  { ru: 'Где находится филиал?', kk: 'Филиал қайда орналасқан?' },
  { ru: 'Как добраться до центра?', kk: 'Орталыққа қалай жетуге болады?' },
  { ru: 'Хотела бы познакомиться с центром до оформления', kk: 'Ресімдеу алдында орталықпен танысқым келеді' },
  { ru: 'Хотела бы поговорить с директором центра', kk: 'Орталық директорымен сөйлескім келеді' },
  { ru: 'Есть предложение или идея', kk: 'Ұсыныс немесе идея бар' },
  { ru: 'Предложение о сотрудничестве', kk: 'Ынтымақтастық туралы ұсыныс' },
  { ru: 'Хочу оставить обращение', kk: 'Өтініш қалдырғым келеді' },
  { ru: 'Другой вопрос', kk: 'Басқа сұрақ' },
];

interface Props {
  open: boolean;
  onClose: () => void;
  /** Филиал, выбранный заранее (кнопка «Записаться в этот филиал») */
  presetBranchId?: string;
}

export const ConsultModal: React.FC<Props> = ({ open, onClose, presetBranchId }) => {
  const { lang } = useAccessibility();
  const ru = lang === 'ru';

  const [name, setName] = useState('');
  const [phone, setPhone] = useState('');
  const [branchId, setBranchId] = useState(presetBranchId || '');
  const [topic, setTopic] = useState('');
  const [comment, setComment] = useState('');

  useEffect(() => {
    if (open) {
      document.body.style.overflow = 'hidden';
      if (presetBranchId) setBranchId(presetBranchId);
    }
    return () => { document.body.style.overflow = ''; };
  }, [open, presetBranchId]);

  if (!open) return null;

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    const branch = BRANCHES.find((b) => b.id === branchId);
    if (!branch) return;
    const L = (r: string, k: string) => (ru ? r : k);
    const lines = [
      L('Консультация по центру', 'Орталық бойынша кеңес'),
      '',
      `${L('Фамилия и имя', 'Тегі және аты')}: ${name}`,
      `${L('Телефон', 'Телефон')}: ${phone}`,
      `${L('Филиал', 'Филиал')}: ${branch.name[lang]}`,
      topic ? `${L('Вопрос', 'Сұрақ')}: ${topic}` : '',
      comment ? `${L('Комментарий', 'Пікір')}: ${comment}` : '',
    ].filter(Boolean);
    // заявка уходит консультанту / руководителю выбранного филиала
    const wa = branch.whatsapp.replace(/\D/g, '');
    window.open(`https://wa.me/${wa}?text=${encodeURIComponent(lines.join('\n'))}`, '_blank', 'noopener,noreferrer');
    onClose();
  };

  const inputCls =
    'w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition';
  const labelCls = 'text-xs font-bold text-slate-700 mb-1.5 block';

  return createPortal(
    <div className="fixed inset-0 z-[100] flex items-start sm:items-center justify-center p-0 sm:p-4 bg-slate-950/60 backdrop-blur-sm overflow-y-auto">
      <div className="bg-white w-full sm:max-w-xl sm:rounded-3xl shadow-2xl my-0 sm:my-8 relative">
        <button
          type="button"
          onClick={onClose}
          aria-label={ru ? 'Закрыть' : 'Жабу'}
          className="absolute top-4 right-4 w-9 h-9 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition cursor-pointer z-10"
        >
          <X className="w-4 h-4" />
        </button>

        <div className="p-5 sm:p-8">
          <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <MapPin className="w-3.5 h-3.5" />
            {ru ? 'Центры EREKSHE ANALAR в Астане' : 'Астанадағы EREKSHE ANALAR орталықтары'}
          </span>
          <h2 className="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight">
            {ru ? 'Консультация по центру' : 'Орталық бойынша кеңес'}
          </h2>
          <p className="text-xs sm:text-sm text-slate-500 mt-1 mb-5">
            {ru
              ? 'Заполните форму — заявка уйдёт консультанту выбранного филиала в WhatsApp.'
              : 'Нысанды толтырыңыз — өтінім таңдалған филиал кеңесшісіне WhatsApp арқылы жіберіледі.'}
          </p>

          <form onSubmit={handleSubmit} className="flex flex-col gap-4">
            <div>
              <label className={labelCls} htmlFor="cs-name">{ru ? 'Фамилия и имя' : 'Тегі және аты'} *</label>
              <input id="cs-name" required value={name} onChange={(e) => setName(e.target.value)}
                placeholder={ru ? 'Введите фамилию и имя' : 'Тегі мен атыңызды енгізіңіз'} className={inputCls} />
            </div>

            <div>
              <label className={labelCls} htmlFor="cs-phone">{ru ? 'Номер телефона' : 'Телефон нөмірі'} *</label>
              <input id="cs-phone" required type="tel" value={phone} onChange={(e) => setPhone(e.target.value)}
                placeholder="+7 (700) 000-00-00" className={inputCls} />
            </div>

            <div>
              <label className={labelCls} htmlFor="cs-branch">{ru ? 'Выберите филиал' : 'Филиалды таңдаңыз'} *</label>
              <select id="cs-branch" required value={branchId} onChange={(e) => setBranchId(e.target.value)} className={inputCls}>
                <option value="" disabled>{ru ? 'Выберите филиал' : 'Филиалды таңдаңыз'}</option>
                {BRANCHES.map((b) => (
                  <option key={b.id} value={b.id}>{b.name[lang]} — {b.address[lang]}</option>
                ))}
              </select>
            </div>

            <div>
              <label className={labelCls} htmlFor="cs-topic">{ru ? 'Что вас интересует?' : 'Сізді не қызықтырады?'} *</label>
              <select id="cs-topic" required value={topic} onChange={(e) => setTopic(e.target.value)} className={inputCls}>
                <option value="" disabled>{ru ? 'Выберите вопрос' : 'Сұрақты таңдаңыз'}</option>
                {TOPICS.map((o) => (
                  <option key={o.ru} value={o[lang]}>{o[lang]}</option>
                ))}
              </select>
            </div>

            <div>
              <label className={labelCls} htmlFor="cs-comment">
                {ru ? 'Ваш вопрос / комментарий' : 'Сұрағыңыз / пікіріңіз'}
              </label>
              <textarea id="cs-comment" rows={3} value={comment} onChange={(e) => setComment(e.target.value)}
                placeholder={ru ? 'Напишите подробнее, что вас интересует' : 'Сізді не қызықтыратынын толығырақ жазыңыз'}
                className={`${inputCls} resize-none`} />
            </div>

            <button type="submit"
              className="w-full px-6 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-extrabold text-sm transition shadow-lg shadow-emerald-600/25 flex items-center justify-center gap-2 cursor-pointer">
              <Send className="w-4 h-4" />
              <span>{ru ? 'Отправить заявку' : 'Өтінім жіберу'}</span>
            </button>

            <p className="text-[11px] text-slate-400 leading-relaxed text-center">
              {ru
                ? 'Нажимая кнопку, вы соглашаетесь на обработку предоставленных персональных данных.'
                : 'Түймені басу арқылы сіз ұсынылған дербес деректерді өңдеуге келісім бересіз.'}
            </p>
          </form>
        </div>
      </div>
    </div>,
    document.body
  );
};
