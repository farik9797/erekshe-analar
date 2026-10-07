import React, { useEffect, useState } from 'react';
import { createPortal } from 'react-dom';
import { useAccessibility } from '../context/AccessibilityContext';
import { X, Sparkles, HeartHandshake } from 'lucide-react';

// Заявка уходит в WhatsApp Центра UMAY
const WA_NUMBER = '77019241965';

const WHO = [
  { ru: 'Мама', kk: 'Анасы' },
  { ru: 'Папа', kk: 'Әкесі' },
  { ru: 'Брат', kk: 'Ағасы / інісі' },
  { ru: 'Сестра', kk: 'Әпкесі / қарындасы' },
  { ru: 'Другой член семьи', kk: 'Отбасының басқа мүшесі' },
];

const SUPPORT = [
  { ru: 'Психологическое консультирование', kk: 'Психологиялық кеңес беру' },
  { ru: 'Арт-терапия и творческие занятия', kk: 'Арт-терапия және шығармашылық сабақтар' },
  { ru: 'Группа взаимоподдержки', kk: 'Өзара қолдау тобы' },
  { ru: 'Обучающие лекции и тренинги', kk: 'Оқыту дәрістері мен тренингтер' },
  { ru: 'Социальная адаптация', kk: 'Әлеуметтік бейімделу' },
  { ru: 'Юридическая консультация', kk: 'Заңгерлік кеңес' },
  { ru: 'Другое', kk: 'Басқа' },
];

const FORMAT = [
  { ru: 'Индивидуальная консультация', kk: 'Жеке кеңес' },
  { ru: 'Групповая встреча', kk: 'Топтық кездесу' },
  { ru: 'Лекция / тренинг', kk: 'Дәріс / тренинг' },
  { ru: 'Мероприятие', kk: 'Іс-шара' },
  { ru: 'Не знаю, хочу получить рекомендацию специалиста', kk: 'Білмеймін, маманның ұсынысын алғым келеді' },
];

interface Props {
  open: boolean;
  onClose: () => void;
}

export const UmayModal: React.FC<Props> = ({ open, onClose }) => {
  const { lang } = useAccessibility();
  const ru = lang === 'ru';

  const [name, setName] = useState('');
  const [phone, setPhone] = useState('');
  const [useWhatsapp, setUseWhatsapp] = useState(true);
  const [who, setWho] = useState('');
  const [support, setSupport] = useState<string[]>([]);
  const [question, setQuestion] = useState('');
  const [format, setFormat] = useState('');
  const [when, setWhen] = useState('');

  useEffect(() => {
    if (open) document.body.style.overflow = 'hidden';
    return () => { document.body.style.overflow = ''; };
  }, [open]);

  if (!open) return null;

  const toggleSupport = (v: string) =>
    setSupport((p) => (p.includes(v) ? p.filter((x) => x !== v) : [...p, v]));

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    const L = (r: string, k: string) => (ru ? r : k);
    const lines = [
      L('Заявка на консультацию в Центре UMAY', 'UMAY орталығына кеңеске өтінім'),
      '',
      `${L('ФИО заявителя', 'Өтініш берушінің аты-жөні')}: ${name}`,
      `${L('Телефон', 'Телефон')}: ${phone}`,
      `${L('Связь по WhatsApp', 'WhatsApp арқылы байланыс')}: ${useWhatsapp ? L('да', 'иә') : L('нет', 'жоқ')}`,
      who ? `${L('Кто вы', 'Сіз кімсіз')}: ${who}` : '',
      support.length ? `${L('Интересует поддержка', 'Қызықтыратын қолдау')}: ${support.join(', ')}` : '',
      question ? `${L('Вопрос', 'Сұрақ')}: ${question}` : '',
      format ? `${L('Удобный формат', 'Қолайлы формат')}: ${format}` : '',
      when ? `${L('Когда удобно связаться', 'Қашан хабарласу ыңғайлы')}: ${when}` : '',
    ].filter(Boolean);
    window.open(`https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(lines.join('\n'))}`, '_blank', 'noopener,noreferrer');
    onClose();
  };

  const inputCls =
    'w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition';
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
          <span className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-100 text-rose-800 text-xs font-bold mb-3">
            <HeartHandshake className="w-3.5 h-3.5" />
            {ru ? 'Центр поддержки родителей UMAY' : 'Ата-аналарды қолдау орталығы UMAY'}
          </span>
          <h2 className="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight">
            {ru ? 'Заявка на бесплатную консультацию в Центре UMAY' : 'UMAY орталығында тегін кеңеске өтінім'}
          </h2>
          <p className="text-xs sm:text-sm text-slate-500 mt-1 mb-5">
            {ru
              ? 'Заполните форму, и наш специалист свяжется с вами в течение 1 рабочего дня.'
              : 'Нысанды толтырыңыз, маманымыз 1 жұмыс күні ішінде сізбен хабарласады.'}
          </p>

          <form onSubmit={handleSubmit} className="flex flex-col gap-4">
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label className={labelCls} htmlFor="um-name">{ru ? 'ФИО заявителя' : 'Өтініш берушінің аты-жөні'} *</label>
                <input id="um-name" required value={name} onChange={(e) => setName(e.target.value)}
                  placeholder={ru ? 'Введите ваше имя и фамилию' : 'Атыңыз бен тегіңізді енгізіңіз'} className={inputCls} />
              </div>
              <div>
                <label className={labelCls} htmlFor="um-phone">{ru ? 'Номер телефона' : 'Телефон нөмірі'} *</label>
                <input id="um-phone" required type="tel" value={phone} onChange={(e) => setPhone(e.target.value)}
                  placeholder="+7 (700) 000-00-00" className={inputCls} />
              </div>
            </div>

            <label className="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" checked={useWhatsapp} onChange={(e) => setUseWhatsapp(e.target.checked)}
                className="w-4 h-4 accent-rose-600 cursor-pointer" />
              <span className="text-xs font-medium text-slate-700">
                {ru ? 'Связаться со мной по WhatsApp' : 'Менімен WhatsApp арқылы байланысыңыз'}
              </span>
            </label>

            <div>
              <span className={labelCls}>{ru ? 'Кто вы?' : 'Сіз кімсіз?'} *</span>
              <div className="flex flex-wrap gap-1.5">
                {WHO.map((o) => {
                  const v = o[lang];
                  return (
                    <label key={o.ru} className="flex items-center gap-2 px-3 py-2 rounded-xl border border-slate-200 hover:bg-rose-50/60 transition cursor-pointer">
                      <input type="radio" name="um-who" required value={v} checked={who === v}
                        onChange={() => setWho(v)} className="w-4 h-4 accent-rose-600 cursor-pointer" />
                      <span className="text-xs text-slate-700">{v}</span>
                    </label>
                  );
                })}
              </div>
            </div>

            <div>
              <span className={labelCls}>{ru ? 'Какая поддержка вас интересует?' : 'Сізді қандай қолдау қызықтырады?'} *</span>
              <p className="text-[11px] text-slate-400 mb-1.5">
                {ru ? 'Можно выбрать несколько вариантов.' : 'Бірнеше нұсқаны таңдауға болады.'}
              </p>
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-1.5">
                {SUPPORT.map((o) => {
                  const v = o[lang];
                  return (
                    <label key={o.ru} className="flex items-start gap-2 p-2 rounded-xl hover:bg-rose-50/60 transition cursor-pointer">
                      <input type="checkbox" checked={support.includes(v)} onChange={() => toggleSupport(v)}
                        className="w-4 h-4 mt-0.5 accent-rose-600 cursor-pointer flex-shrink-0" />
                      <span className="text-xs text-slate-700 leading-snug">{v}</span>
                    </label>
                  );
                })}
              </div>
            </div>

            <div>
              <label className={labelCls} htmlFor="um-question">
                {ru ? 'Расскажите, с каким вопросом вы хотели бы обратиться' : 'Қандай сұрақпен жүгінгіңіз келетінін жазыңыз'}
              </label>
              <textarea id="um-question" rows={2} value={question} onChange={(e) => setQuestion(e.target.value)}
                placeholder={ru ? 'Кратко опишите ваш запрос' : 'Сұранысыңызды қысқаша сипаттаңыз'}
                className={`${inputCls} resize-none`} />
            </div>

            <div>
              <span className={labelCls}>{ru ? 'Какой формат вам удобнее?' : 'Сізге қандай формат ыңғайлы?'}</span>
              <div className="flex flex-col gap-1">
                {FORMAT.map((o) => {
                  const v = o[lang];
                  return (
                    <label key={o.ru} className="flex items-start gap-2 p-2 rounded-xl hover:bg-rose-50/60 transition cursor-pointer">
                      <input type="radio" name="um-format" value={v} checked={format === v}
                        onChange={() => setFormat(v)} className="w-4 h-4 mt-0.5 accent-rose-600 cursor-pointer flex-shrink-0" />
                      <span className="text-xs text-slate-700 leading-snug">{v}</span>
                    </label>
                  );
                })}
              </div>
            </div>

            <div>
              <label className={labelCls} htmlFor="um-when">{ru ? 'Когда вам удобно связаться?' : 'Қашан хабарласу ыңғайлы?'}</label>
              <input id="um-when" value={when} onChange={(e) => setWhen(e.target.value)}
                placeholder={ru ? 'Укажите удобный день и время' : 'Ыңғайлы күн мен уақытты көрсетіңіз'} className={inputCls} />
            </div>

            <button type="submit"
              className="w-full px-6 py-3.5 rounded-2xl bg-rose-600 hover:bg-rose-500 text-white font-extrabold text-sm transition shadow-lg shadow-rose-600/25 flex items-center justify-center gap-2 cursor-pointer">
              <Sparkles className="w-4 h-4" />
              <span>{ru ? 'Записаться на консультацию' : 'Кеңеске жазылу'}</span>
            </button>

            <p className="text-[11px] text-slate-400 leading-relaxed text-center">
              {ru
                ? 'Нажимая кнопку «Записаться на консультацию», вы соглашаетесь на обработку предоставленных персональных данных.'
                : '«Кеңеске жазылу» түймесін басу арқылы сіз ұсынылған дербес деректерді өңдеуге келісім бересіз.'}
            </p>
          </form>
        </div>
      </div>
    </div>,
    document.body
  );
};
