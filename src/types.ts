export type Language = 'ru' | 'kk';

export type HighContrastMode = 'normal' | 'contrast-dark' | 'contrast-yellow' | 'contrast-blue';

export type FontSizeLevel = 'normal' | 'large' | 'xlarge';

export interface AccessibilitySettings {
  isImpairedMode: boolean;
  contrastMode: HighContrastMode;
  fontSize: FontSizeLevel;
  hideImages: boolean;
  speechEnabled: boolean;
}

export interface Branch {
  id: string;
  name: { ru: string; kk: string };
  address: { ru: string; kk: string };
  district: { ru: string; kk: string };
  phone: string;
  whatsapp: string;
  workHours: { ru: string; kk: string };
  features: { ru: string[]; kk: string[] };
  image: string;
  mapCoordinates: { lat: number; lng: number };
  isHeadquarters?: boolean;
}

export interface ServiceItem {
  id: string;
  title: { ru: string; kk: string };
  shortDesc: { ru: string; kk: string };
  fullDesc: { ru: string; kk: string };
  iconName: string;
  category: 'correction' | 'physical' | 'water' | 'social' | 'parents';
  indications: { ru: string[]; kk: string[] };
  results: { ru: string[]; kk: string[] };
  duration: { ru: string; kk: string };
  targetAge: { ru: string; kk: string };
  availableBranches: string[];
  image: string;
}

export interface Specialist {
  id: string;
  name: { ru: string; kk: string };
  role: { ru: string; kk: string };
  category: 'management' | 'methodology' | 'logoped' | 'defectolog' | 'psycholog' | 'afk_lfk' | 'physio' | 'educator';
  experience: { ru: string; kk: string };
  education: { ru: string; kk: string };
  specialization: { ru: string[]; kk: string[] };
  bio: { ru: string; kk: string };
  quote?: { ru: string; kk: string };
  image: string;
}

export interface NewsItem {
  id: string;
  title: { ru: string; kk: string };
  summary: { ru: string; kk: string };
  content: { ru: string; kk: string };
  date: string;
  category: 'announcement' | 'charity' | 'holiday' | 'news' | 'vacancy';
  image: string;
  badge?: { ru: string; kk: string };
}

export interface ReviewItem {
  id: string;
  parentName: { ru: string; kk: string };
  childAgeDiagnosis: { ru: string; kk: string };
  branchId: string;
  text: { ru: string; kk: string };
  result: { ru: string; kk: string };
  date: string;
  rating: number;
  avatar: string;
}

export interface FaqItem {
  id: string;
  question: { ru: string; kk: string };
  answer: { ru: string; kk: string };
  category: 'general' | 'documents' | 'rehabilitation' | 'umay';
}

export interface DocumentItem {
  id: string;
  title: { ru: string; kk: string };
  category: { ru: string; kk: string };
  fileSize: string;
  date: string;
  fileUrl: string;
}

export interface SocialProject {
  id: string;
  title: { ru: string; kk: string };
  description: { ru: string; kk: string };
  targetAmount?: number;
  currentAmount?: number;
  beneficiariesCount: number;
  status: 'active' | 'completed';
  image: string;
}

export interface GalleryItem {
  id: string;
  title: { ru: string; kk: string };
  category: 'classes' | 'pool' | 'salt_room' | 'umay' | 'events';
  imageUrl: string;
}

export interface ApplicationFormData {
  parentName: string;
  phone: string;
  useWhatsapp: boolean;
  childName: string;
  childAge: string;
  preferredBranch: string;
  selectedServices: string[];
  diagnosisNotes: string;
  preferredContactTime: string;
}
