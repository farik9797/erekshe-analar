import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { FontSizeLevel } from '../types';
import { Eye, ImageOff, Image as ImageIcon, X } from 'lucide-react';

const FONT_LEVELS: FontSizeLevel[] = ['normal', 'large', 'xlarge'];
const FONT_PERCENT: Record<FontSizeLevel, string> = {
  normal: '100%',
  large: '120%',
  xlarge: '140%'
};

export const AccessibilityBar: React.FC = () => {
  const {
    t,
    isImpairedMode,
    setIsImpairedMode,
    contrastMode,
    setContrastMode,
    fontSize,
    setFontSize,
    hideImages,
    setHideImages
  } = useAccessibility();

  if (!isImpairedMode) return null;

  const fontIdx = FONT_LEVELS.indexOf(fontSize);
  const decreaseFont = () => setFontSize(FONT_LEVELS[Math.max(0, fontIdx - 1)]);
  const increaseFont = () => setFontSize(FONT_LEVELS[Math.min(FONT_LEVELS.length - 1, fontIdx + 1)]);

  return (
    <div
      id="accessibility-toolbar"
      className="bg-emerald-900 text-white px-4 py-3 border-b-2 border-emerald-500 shadow-md transition-all text-sm font-medium z-50 sticky top-0"
    >
      <div className="max-w-7xl mx-auto flex flex-wrap md:flex-nowrap items-center justify-start md:justify-between gap-x-4 gap-y-3 md:overflow-x-auto">
        {/* Title */}
        <div className="flex shrink-0 items-center gap-2 text-emerald-200">
          <Eye className="w-5 h-5 text-emerald-400" />
          <span className="font-bold text-base whitespace-nowrap">{t.accessibilityTitle}</span>
        </div>

        {/* Font Size Controls */}
        <div className="flex shrink-0 items-center gap-2">
          <span className="text-emerald-300 text-xs uppercase tracking-wider whitespace-nowrap">{t.fontSizeLabel}</span>
          <div className="flex items-center bg-emerald-800 rounded-lg p-1 border border-emerald-700">
            <button
              onClick={decreaseFont}
              disabled={fontIdx === 0}
              aria-label="Уменьшить размер шрифта"
              className="px-2.5 py-1 rounded font-bold leading-none text-emerald-100 transition hover:bg-emerald-600 hover:text-white disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:bg-transparent disabled:hover:text-emerald-100"
            >
              <span className="text-xs">A</span>&#8722;
            </button>
            <span className="px-2 text-xs tabular-nums text-center text-emerald-100 min-w-[3rem]">{FONT_PERCENT[fontSize]}</span>
            <button
              onClick={increaseFont}
              disabled={fontIdx === FONT_LEVELS.length - 1}
              aria-label="Увеличить размер шрифта"
              className="px-2.5 py-1 rounded font-bold leading-none text-emerald-100 transition hover:bg-emerald-600 hover:text-white disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:bg-transparent disabled:hover:text-emerald-100"
            >
              <span className="text-base">A</span>+
            </button>
          </div>
        </div>

        {/* Contrast Modes */}
        <div className="flex w-full md:w-auto md:shrink-0 items-center gap-2">
          <span className="text-emerald-300 text-xs uppercase tracking-wider whitespace-nowrap">{t.contrastLabel}</span>
          <div className="flex flex-wrap md:flex-nowrap gap-1.5 md:shrink-0">
            <button
              onClick={() => setContrastMode('normal')}
              title={t.contrastNormal}
              className={`px-2.5 py-1 rounded text-xs border whitespace-nowrap ${
                contrastMode === 'normal' ? 'bg-white text-emerald-950 font-bold border-white' : 'bg-emerald-800 border-emerald-700 text-emerald-200'
              }`}
            >
              АА
            </button>
            <button
              onClick={() => setContrastMode('contrast-dark')}
              title={t.contrastDark}
              className={`px-2.5 py-1 rounded text-xs border whitespace-nowrap ${
                contrastMode === 'contrast-dark' ? 'bg-black text-white font-bold border-white' : 'bg-black text-white border-emerald-700'
              }`}
            >
              АА (Черный)
            </button>
            <button
              onClick={() => setContrastMode('contrast-yellow')}
              title={t.contrastYellow}
              className={`px-2.5 py-1 rounded text-xs border whitespace-nowrap ${
                contrastMode === 'contrast-yellow' ? 'bg-black text-yellow-300 font-bold border-yellow-300' : 'bg-black text-yellow-400 border-emerald-700'
              }`}
            >
              АА (Сары)
            </button>
            <button
              onClick={() => setContrastMode('contrast-blue')}
              title={t.contrastBlue}
              className={`px-2.5 py-1 rounded text-xs border whitespace-nowrap ${
                contrastMode === 'contrast-blue' ? 'bg-sky-100 text-sky-900 font-bold border-sky-400' : 'bg-sky-900 text-sky-200 border-emerald-700'
              }`}
            >
              АА (Көк)
            </button>
          </div>
        </div>

        {/* Image Hide */}
        <div className="flex shrink-0 items-center gap-3">
          <button
            onClick={() => setHideImages(!hideImages)}
            className={`flex items-center gap-1.5 px-3 py-1 rounded text-xs transition border whitespace-nowrap ${
              hideImages ? 'bg-amber-500 text-slate-950 font-bold border-amber-400' : 'bg-emerald-800 text-emerald-200 border-emerald-700'
            }`}
          >
            {hideImages ? <ImageOff className="w-4 h-4" /> : <ImageIcon className="w-4 h-4" />}
            {t.hideImagesLabel}
          </button>

          {/* Close Panel Button */}
          <button
            onClick={() => setIsImpairedMode(false)}
            className="p-1 rounded-full bg-emerald-800 text-emerald-200 hover:text-white hover:bg-emerald-700 transition ml-2"
            title="Закрыть панель доступности"
          >
            <X className="w-5 h-5" />
          </button>
        </div>
      </div>
    </div>
  );
};
