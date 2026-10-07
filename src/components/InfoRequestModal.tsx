import React, { useEffect, useState } from 'react';
import { createPortal } from 'react-dom';
import { useAccessibility } from '../context/AccessibilityContext';
import { BRANCHES } from '../data/mockData';
import { X, Send, Info } from 'lucide-react';

// Заявка уходит в WhatsApp методиста
const WA_NUMBER = '77761639521';

const INTERESTS = [
  { ru: 'Расписание занятий ребёнка', kk: 'Баланың сабақ кестесі' },
  { ru: 'Какие услуги получает ребёнок', kk: 'Бала қандай қызметтер алады' },
  { ru: 'Поговорить со специалистом', kk: 'Маманмен сөйлесу' },
  { ru: 'Вопросы по развитию ребёнка', kk: 'Баланың дамуы бойынша сұрақтар' },
  { ru: 'Динамика развития ребёнка', kk: 'Баланың даму динамикасы' },
  { ru: 'Диагностика', kk: 'Диагностика' },
  { ru: 'Индивидуальная программа развития', kk: 'Жеке даму бағдарламасы' },
  { ru: 'Характеристика на ребёнка', kk: 'Балаға мінездеме' },
  { ru: 'Вопросы по фото- и видеоотчётам', kk: 'Фото- және бейнеесептер бойынша сұрақтар' },
  { ru: 'Другое', kk: 'Басқа' },
];

interface Props {
  open: boolean;
  onClose: () => void;
}

export const InfoRequestModal: React.FC<Props> = ({ open, onClose }) => {
  const { lang } = useAccessibility();
  const ru = lang === 'ru';

  const [parentName, setParentName] = useState('');
  const [phone, setPhone] = useState('');
  const [useWhatsapp, setUseWhatsapp] = useState(true);
  const [childName, setChildName] = useState('');
  const [childAge, setChildAge] = useState('');
  const [branch, setBranch] = useState(
    BRANCHES[0] ? `${BRANCHES[0].name[lang]} — ${BRANCHES[0].address[lang]}` : ''
  );
  const [interests, setInterests] = useState<string[]>([]);
  const [diagnosis, setDiagnosis] = useState('');
  const [comment, setComment] = useState('');

  useEffect(() => {
    if (open) document.body.style.overflow = 'hidden';
    return () => { document.body.style.overflow = ''; };
  }, [open]);

  if (!open) return null;

  const toggleInterest = (v: string) =>
    setInterests((p) => (p.includes(v) ? p.filter((x) => x !== v) : [...p, v]));

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    const L = (r: string, k: string) => (ru ? r : k);
    const lines = [
      L('Запрос на информацию и помощь', 'Ақпарат пен көмекке сұраныс'),
      '',
      `${L('ФИО родителя', 'Ата-ананың аты-жөні')}: ${parentName}`,
      `${L('Телефон', 'Телефон')}: ${phone}`,
      `${L('Связь по WhatsApp', 'WhatsApp арқылы байланыс')}: ${useWhatsapp ? L('да', 'иә') : L('нет', 'жоқ')}`,
      `${L('Имя ребёнка', 'Баланың аты')}: ${childName}`,
      `${L('Возраст ребёнка', 'Баланың жасы')}: ${childAge}`,
      `${L('Филиал', 'Филиал')}: ${branch}`,
      interests.length ? `${L('Интересует', 'Қызықтырады')}: ${interests.join(', ')}` : '',
      diagnosis ? `${L('Диагноз / особенности', 'Диагноз / ерекшеліктері')}: ${diagnosis}` : '',
      comment ? `${L('Вопрос', 'Сұрақ')}: ${comment}` : '',
    ].filter(Boolean);
    window.open(`https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(lines.join('\n'))}`, '_blank', 'noopener,noreferrer');
    onClose();
  };

  const inputCls =
    'w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition';
  const labelCls = 'text-xs font-bold text-slate-700 mb-1.5 block';

  return createPortal(
    <div className="fixed inset-0 z-[100] flex items-start sm:items-center justify-center p-0 sm:p-4 bg-slate-950/60 backdrop-blur-sm overflow-y-auto">
      <div className="bg-white w-full sm:max-w-2xl sm:rounded-3xl shadow-2xl my-0 sm:my-8 relative">
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
            <Info className="w-3.5 h-3.5" />
            {ru ? 'Центры EREKSHE ANALAR' : 'EREKSHE ANALAR орталықтары'}
          </span>
          <h2 className="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight">
            {ru ? 'Запрос на информацию и помощь' : 'Ақпарат пен көмекке сұраныс'}
          </h2>
          <p className="text-xs sm:text-sm text-slate-500 mt-1 mb-5">
            {ru
              ? 'Заполните форму, и наш методист свяжется с вами в течение 1 рабочего дня.'
              : 'Нысанды толтырыңыз, әдіскеріміз 1 жұмыс күні ішінде сізбен хабарласады.'}
          </p>

          <form onSubmit={handleSubmit} className="flex flex-col gap-4">
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label className={labelCls} htmlFor="ir-parent">
                  {ru ? 'ФИО родителя / законного представителя' : 'Ата-ананың / заңды өкілдің аты-жөні'} *
                </label>
                <input id="ir-parent" required value={parentName} onChange={(e) => setParentName(e.target.value)}
                  placeholder={ru ? 'ФИО родителя' : 'Ата-ананың аты-жөні'} className={inputCls} />
              </div>
              <div>
                <label className={labelCls} htmlFor="ir-phone">{ru ? 'Номер телефона' : 'Телефон нөмірі'} *</label>
                <input id="ir-phone" required type="tel" value={phone} onChange={(e) => setPhone(e.target.value)}
                  placeholder="+7 (700) 000-00-00" className={inputCls} />
              </div>
            </div>

            <label className="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" checked={useWhatsapp} onChange={(e) => setUseWhatsapp(e.target.checked)}
                className="w-4 h-4 accent-emerald-600 cursor-pointer" />
              <span className="text-xs font-medium text-slate-700">
                {ru ? 'Связаться со мной по WhatsApp' : 'Менімен WhatsApp арқылы байланысыңыз'}
              </span>
            </label>

            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label className={labelCls} htmlFor="ir-child">{ru ? 'Имя ребёнка' : 'Баланың аты'} *</label>
                <input id="ir-child" required value={childName} onChange={(e) => setChildName(e.target.value)}
                  placeholder={ru ? 'Имя ребёнка' : 'Баланың аты'} className={inputCls} />
              </div>
              <div>
                <label className={labelCls} htmlFor="ir-age">{ru ? 'Возраст ребёнка' : 'Баланың жасы'} *</label>
                <input id="ir-age" required value={childAge} onChange={(e) => setChildAge(e.target.value)}
                  placeholder={ru ? 'Например: 5 лет' : 'Мысалы: 5 жас'} className={inputCls} />
              </div>
            </div>

            <div>
              <label className={labelCls} htmlFor="ir-branch">
                {ru ? 'Предпочтительный филиал в Астане' : 'Астанадағы қалаулы филиал'} *
              </label>
              <select id="ir-branch" required value={branch} onChange={(e) => setBranch(e.target.value)} className={inputCls}>
                {BRANCHES.map((b) => (
                  <option key={b.id} value={`${b.name[lang]} — ${b.address[lang]}`}>
                    {b.name[lang]} — {b.address[lang]}
                  </option>
                ))}
              </select>
            </div>

            <div>
              <span className={labelCls}>{ru ? 'Что вас интересует?' : 'Сізді не қызықтырады?'}</span>
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-1.5">
                {INTERESTS.map((o) => {
                  const v = o[lang];
                  return (
                    <label key={o.ru} className="flex items-start gap-2 p-2 rounded-xl hover:bg-emerald-50/60 transition cursor-pointer">
                      <input type="checkbox" checked={interests.includes(v)} onChange={() => toggleInterest(v)}
                        className="w-4 h-4 mt-0.5 accent-emerald-600 cursor-pointer flex-shrink-0" />
                      <span className="text-xs text-slate-700 leading-snug">{v}</span>
                    </label>
                  );
                })}
              </div>
            </div>

            <div>
              <label className={labelCls} htmlFor="ir-diag">
                {ru ? 'Диагноз или особенности развития ребёнка (кратко)' : 'Диагноз немесе баланың даму ерекшеліктері (қысқаша)'}
              </label>
              <textarea id="ir-diag" rows={2} value={diagnosis} onChange={(e) => setDiagnosis(e.target.value)}
                placeholder={ru ? 'Кратко опишите особенности развития ребёнка' : 'Баланың даму ерекшеліктерін қысқаша жазыңыз'}
                className={`${inputCls} resize-none`} />
            </div>

            <div>
              <label className={labelCls} htmlFor="ir-comment">
                {ru ? 'Ваш вопрос или комментарий' : 'Сұрағыңыз немесе пікіріңіз'}
              </label>
              <textarea id="ir-comment" rows={2} value={comment} onChange={(e) => setComment(e.target.value)}
                placeholder={ru ? 'Напишите, какая информация вам необходима' : 'Қандай ақпарат қажет екенін жазыңыз'}
                className={`${inputCls} resize-none`} />
            </div>

            <button type="submit"
              className="w-full px-6 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-extrabold text-sm transition shadow-lg shadow-emerald-600/25 flex items-center justify-center gap-2 cursor-pointer">
              <Send className="w-4 h-4" />
              <span>{ru ? 'Отправить запрос' : 'Сұранысты жіберу'}</span>
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
