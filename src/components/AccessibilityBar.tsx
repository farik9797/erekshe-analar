import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { Eye, Volume2, VolumeX, ImageOff, Image as ImageIcon, X } from 'lucide-react';

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
    setHideImages,
    speechEnabled,
    setSpeechEnabled,
    stopSpeech,
    isSpeaking
  } = useAccessibility();

  if (!isImpairedMode) return null;

  return (
    <div
      id="accessibility-toolbar"
      className="bg-emerald-900 text-white px-4 py-3 border-b-2 border-emerald-500 shadow-md transition-all text-sm font-medium z-50 sticky top-0"
    >
      <div className="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-4">
        {/* Title */}
        <div className="flex items-center gap-2 text-emerald-200">
          <Eye className="w-5 h-5 text-emerald-400" />
          <span className="font-bold text-base">{t.accessibilityTitle}</span>
        </div>

        {/* Font Size Controls */}
        <div className="flex items-center gap-2">
          <span className="text-emerald-300 text-xs uppercase tracking-wider">{t.fontSizeLabel}</span>
          <div className="flex bg-emerald-800 rounded-lg p-1 border border-emerald-700">
            <button
              onClick={() => setFontSize('normal')}
              className={`px-3 py-1 rounded text-xs font-semibold transition ${
                fontSize === 'normal' ? 'bg-emerald-500 text-white shadow' : 'text-emerald-200 hover:text-white'
              }`}
            >
              {t.fontNormal} (100%)
            </button>
            <button
              onClick={() => setFontSize('large')}
              className={`px-3 py-1 rounded text-xs font-semibold transition ${
                fontSize === 'large' ? 'bg-emerald-500 text-white shadow' : 'text-emerald-200 hover:text-white'
              }`}
            >
              {t.fontLarge} (120%)
            </button>
            <button
              onClick={() => setFontSize('xlarge')}
              className={`px-3 py-1 rounded text-xs font-semibold transition ${
                fontSize === 'xlarge' ? 'bg-emerald-500 text-white shadow' : 'text-emerald-200 hover:text-white'
              }`}
            >
              {t.fontXLarge} (140%)
            </button>
          </div>
        </div>

        {/* Contrast Modes */}
        <div className="flex items-center gap-2">
          <span className="text-emerald-300 text-xs uppercase tracking-wider">{t.contrastLabel}</span>
          <div className="flex gap-1.5">
            <button
              onClick={() => setContrastMode('normal')}
              title={t.contrastNormal}
              className={`px-2.5 py-1 rounded text-xs border ${
                contrastMode === 'normal' ? 'bg-white text-emerald-950 font-bold border-white' : 'bg-emerald-800 border-emerald-700 text-emerald-200'
              }`}
            >
              АА
            </button>
            <button
              onClick={() => setContrastMode('contrast-dark')}
              title={t.contrastDark}
              className={`px-2.5 py-1 rounded text-xs border ${
                contrastMode === 'contrast-dark' ? 'bg-black text-white font-bold border-white' : 'bg-black text-white border-emerald-700'
              }`}
            >
              АА (Черный)
            </button>
            <button
              onClick={() => setContrastMode('contrast-yellow')}
              title={t.contrastYellow}
              className={`px-2.5 py-1 rounded text-xs border ${
                contrastMode === 'contrast-yellow' ? 'bg-black text-yellow-300 font-bold border-yellow-300' : 'bg-black text-yellow-400 border-emerald-700'
              }`}
            >
              АА (Сары)
            </button>
            <button
              onClick={() => setContrastMode('contrast-blue')}
              title={t.contrastBlue}
              className={`px-2.5 py-1 rounded text-xs border ${
                contrastMode === 'contrast-blue' ? 'bg-sky-100 text-sky-900 font-bold border-sky-400' : 'bg-sky-900 text-sky-200 border-emerald-700'
              }`}
            >
              АА (Көк)
            </button>
          </div>
        </div>

        {/* Image Hide & Speech */}
        <div className="flex items-center gap-3">
          <button
            onClick={() => setHideImages(!hideImages)}
            className={`flex items-center gap-1.5 px-3 py-1 rounded text-xs transition border ${
              hideImages ? 'bg-amber-500 text-slate-950 font-bold border-amber-400' : 'bg-emerald-800 text-emerald-200 border-emerald-700'
            }`}
          >
            {hideImages ? <ImageOff className="w-4 h-4" /> : <ImageIcon className="w-4 h-4" />}
            {t.hideImagesLabel}
          </button>

          <button
            onClick={() => {
              if (isSpeaking) {
                stopSpeech();
              }
              setSpeechEnabled(!speechEnabled);
            }}
            className={`flex items-center gap-1.5 px-3 py-1 rounded text-xs transition border ${
              speechEnabled ? 'bg-emerald-500 text-white font-bold border-emerald-400' : 'bg-emerald-800 text-emerald-200 border-emerald-700'
            }`}
          >
            {speechEnabled ? <Volume2 className="w-4 h-4 animate-pulse" /> : <VolumeX className="w-4 h-4" />}
            {t.speechLabel}
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
