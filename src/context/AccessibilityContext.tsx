import React, { createContext, useContext, useState, useEffect } from 'react';
import { Language, HighContrastMode, FontSizeLevel, ServiceItem } from '../types';
import { translations } from '../data/translations';

interface AccessibilityContextType {
  lang: Language;
  setLang: (lang: Language) => void;
  t: typeof translations.ru;
  isImpairedMode: boolean;
  setIsImpairedMode: React.Dispatch<React.SetStateAction<boolean>>;
  contrastMode: HighContrastMode;
  setContrastMode: (mode: HighContrastMode) => void;
  fontSize: FontSizeLevel;
  setFontSize: (size: FontSizeLevel) => void;
  hideImages: boolean;
  setHideImages: React.Dispatch<React.SetStateAction<boolean>>;
  speechEnabled: boolean;
  setSpeechEnabled: React.Dispatch<React.SetStateAction<boolean>>;
  speakText: (text: string) => void;
  stopSpeech: () => void;
  isSpeaking: boolean;

  // Modals state
  isEnrollModalOpen: boolean;
  openEnrollModal: (branchId?: string, serviceId?: string) => void;
  closeEnrollModal: () => void;
  preselectedBranch: string;
  preselectedService: string;

  isDonationModalOpen: boolean;
  openDonationModal: () => void;
  closeDonationModal: () => void;

  selectedServiceForModal: ServiceItem | null;
  openServiceModal: (service: ServiceItem) => void;
  closeServiceModal: () => void;
}

const AccessibilityContext = createContext<AccessibilityContextType | undefined>(undefined);

export const AccessibilityProvider: React.FC<{ children: React.ReactNode }> = ({ children }) => {
  const [lang, setLang] = useState<Language>('ru');
  const [isImpairedMode, setIsImpairedMode] = useState<boolean>(false);
  const [contrastMode, setContrastMode] = useState<HighContrastMode>('normal');
  const [fontSize, setFontSize] = useState<FontSizeLevel>('normal');
  const [hideImages, setHideImages] = useState<boolean>(false);
  const [speechEnabled, setSpeechEnabled] = useState<boolean>(false);
  const [isSpeaking, setIsSpeaking] = useState<boolean>(false);

  // Modals
  const [isEnrollModalOpen, setIsEnrollModalOpen] = useState(false);
  const [preselectedBranch, setPreselectedBranch] = useState('');
  const [preselectedService, setPreselectedService] = useState('');

  const [isDonationModalOpen, setIsDonationModalOpen] = useState(false);
  const [selectedServiceForModal, setSelectedServiceForModal] = useState<ServiceItem | null>(null);

  const t = translations[lang];

  // Apply root DOM attributes for styling
  useEffect(() => {
    const root = document.documentElement;
    
    // Contrast classes
    root.classList.remove('contrast-dark', 'contrast-yellow', 'contrast-blue');
    if (contrastMode !== 'normal') {
      root.classList.add(contrastMode);
    }

    // Font size classes
    root.classList.remove('text-size-large', 'text-size-xlarge');
    if (fontSize === 'large') {
      root.classList.add('text-size-large');
    } else if (fontSize === 'xlarge') {
      root.classList.add('text-size-xlarge');
    }
  }, [contrastMode, fontSize]);

  const speakText = (text: string) => {
    if (!('speechSynthesis' in window)) return;
    window.speechSynthesis.cancel();
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.lang = lang === 'kk' ? 'kk-KZ' : 'ru-RU';
    utterance.rate = 0.95;
    utterance.onstart = () => setIsSpeaking(true);
    utterance.onend = () => setIsSpeaking(false);
    utterance.onerror = () => setIsSpeaking(false);
    window.speechSynthesis.speak(utterance);
  };

  const stopSpeech = () => {
    if ('speechSynthesis' in window) {
      window.speechSynthesis.cancel();
      setIsSpeaking(false);
    }
  };

  const openEnrollModal = (branchId?: string, serviceId?: string) => {
    setPreselectedBranch(branchId || '');
    setPreselectedService(serviceId || '');
    setIsEnrollModalOpen(true);
  };

  const closeEnrollModal = () => {
    setIsEnrollModalOpen(false);
  };

  const openDonationModal = () => setIsDonationModalOpen(true);
  const closeDonationModal = () => setIsDonationModalOpen(false);

  const openServiceModal = (service: ServiceItem) => setSelectedServiceForModal(service);
  const closeServiceModal = () => setSelectedServiceForModal(null);

  return (
    <AccessibilityContext.Provider
      value={{
        lang,
        setLang,
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
        speakText,
        stopSpeech,
        isSpeaking,

        isEnrollModalOpen,
        openEnrollModal,
        closeEnrollModal,
        preselectedBranch,
        preselectedService,

        isDonationModalOpen,
        openDonationModal,
        closeDonationModal,

        selectedServiceForModal,
        openServiceModal,
        closeServiceModal
      }}
    >
      {children}
    </AccessibilityContext.Provider>
  );
};

export const useAccessibility = () => {
  const context = useContext(AccessibilityContext);
  if (!context) {
    throw new Error('useAccessibility must be used within an AccessibilityProvider');
  }
  return context;
};
