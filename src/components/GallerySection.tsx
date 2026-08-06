import React, { useState } from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { GALLERY_ITEMS } from '../data/mockData';
import { GalleryItem } from '../types';
import { Camera, X, Maximize2 } from 'lucide-react';

export const GallerySection: React.FC = () => {
  const { lang, t, hideImages } = useAccessibility();
  const [activeCategory, setActiveCategory] = useState<string>('all');
  const [lightboxItem, setLightboxItem] = useState<GalleryItem | null>(null);

  const categories = [
    { id: 'all', label: t.filterGalleryAll },
    { id: 'classes', label: t.filterGalleryClasses },
    { id: 'pool', label: t.filterGalleryPool },
    { id: 'salt_room', label: t.filterGallerySalt },
    { id: 'umay', label: t.filterGalleryUmay },
    { id: 'events', label: t.filterGalleryEvents }
  ];

  const filteredItems = activeCategory === 'all'
    ? GALLERY_ITEMS
    : GALLERY_ITEMS.filter((g) => g.category === activeCategory);

  return (
    <section id="gallery" className="py-16 md:py-24 bg-white border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-12">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <Camera className="w-4 h-4 text-emerald-600" />
            <span>{t.galleryBadge}</span>
          </div>
          <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.galleryTitle}
          </h2>
        </div>

        {/* Category Filters */}
        <div className="flex flex-wrap items-center justify-center gap-2 mb-10">
          {categories.map((cat) => (
            <button
              key={cat.id}
              onClick={() => setActiveCategory(cat.id)}
              className={`px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition ${
                activeCategory === cat.id
                  ? 'bg-emerald-600 text-white shadow-md'
                  : 'bg-slate-100 text-slate-700 hover:bg-slate-200'
              }`}
            >
              {cat.label}
            </button>
          ))}
        </div>

        {/* Photo Grid */}
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
          {filteredItems.map((item) => (
            <div
              key={item.id}
              onClick={() => setLightboxItem(item)}
              className="group relative h-64 rounded-3xl overflow-hidden shadow-xs cursor-pointer bg-slate-100 border border-slate-200"
            >
              {!hideImages ? (
                <img
                  src={item.imageUrl}
                  alt={item.title[lang]}
                  className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                />
              ) : (
                <div className="w-full h-full bg-emerald-800 text-white flex items-center justify-center p-4">
                  <span className="font-bold text-center">{item.title[lang]}</span>
                </div>
              )}

              <div className="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                <div className="text-white flex items-center justify-between w-full">
                  <span className="font-bold text-sm">{item.title[lang]}</span>
                  <div className="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white">
                    <Maximize2 className="w-4 h-4" />
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>

      {/* Lightbox Modal */}
      {lightboxItem && (
        <div
          onClick={() => setLightboxItem(null)}
          className="fixed inset-0 bg-slate-950/90 z-50 flex items-center justify-center p-4 animate-fadeIn"
        >
          <div className="relative max-w-4xl w-full max-h-[90vh] flex flex-col items-center">
            <button
              onClick={() => setLightboxItem(null)}
              className="absolute -top-12 right-0 p-2 rounded-full bg-white/20 text-white hover:bg-white/40 transition"
            >
              <X className="w-6 h-6" />
            </button>
            <img
              src={lightboxItem.imageUrl}
              alt={lightboxItem.title[lang]}
              className="max-h-[80vh] w-auto rounded-2xl shadow-2xl object-contain"
            />
            <p className="text-white font-bold text-lg mt-4 text-center">{lightboxItem.title[lang]}</p>
          </div>
        </div>
      )}
    </section>
  );
};
