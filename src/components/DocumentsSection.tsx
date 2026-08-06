import React from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { DOCUMENTS } from '../data/mockData';
import {
  FileCheck,
  Download,
  Eye,
  FileText,
  ShieldCheck
} from 'lucide-react';

export const DocumentsSection: React.FC = () => {
  const { lang, t } = useAccessibility();

  return (
    <section id="documents" className="py-16 md:py-24 bg-white border-b border-slate-100">
      <div className="max-w-7xl mx-auto px-4">
        {/* Section Header */}
        <div className="text-center max-w-3xl mx-auto mb-16">
          <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
            <ShieldCheck className="w-4 h-4 text-emerald-600" />
            <span>{t.documentsBadge}</span>
          </div>
          <h2 className="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            {t.documentsTitle}
          </h2>
          <p className="text-slate-600 text-sm sm:text-base mt-3">
            {t.documentsDesc}
          </p>
        </div>

        {/* Documents Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
          {DOCUMENTS.map((doc) => (
            <div
              key={doc.id}
              className="bg-slate-50 hover:bg-emerald-50/50 p-6 rounded-3xl border border-slate-200/80 hover:border-emerald-300 transition-all flex items-start gap-4 group"
            >
              <div className="w-12 h-12 rounded-2xl bg-white text-emerald-600 flex items-center justify-center flex-shrink-0 shadow-xs group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                <FileText className="w-6 h-6" />
              </div>

              <div className="flex-1 flex flex-col justify-between gap-3">
                <div>
                  <div className="flex items-center justify-between gap-2 mb-1">
                    <span className="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-100/80 px-2.5 py-0.5 rounded">
                      {doc.category[lang]}
                    </span>
                    <span className="text-[11px] font-medium text-slate-400">
                      {doc.date} • {doc.fileSize}
                    </span>
                  </div>
                  <h3 className="text-base font-bold text-slate-900 leading-snug group-hover:text-emerald-800 transition-colors">
                    {doc.title[lang]}
                  </h3>
                </div>

                <div className="flex items-center gap-2 pt-2 border-t border-slate-200/60">
                  <a
                    href="#"
                    onClick={(e) => {
                      e.preventDefault();
                      alert(`Просмотр документа "${doc.title[lang]}"`);
                    }}
                    className="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold text-slate-700 bg-white hover:bg-slate-200 transition border border-slate-200"
                  >
                    <Eye className="w-3.5 h-3.5 text-emerald-600" />
                    <span>{t.btnViewDoc}</span>
                  </a>

                  <a
                    href="#"
                    onClick={(e) => {
                      e.preventDefault();
                      alert(`Загрузка файла: ${doc.title[lang]} (${doc.fileSize})`);
                    }}
                    className="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold text-emerald-800 bg-emerald-100/80 hover:bg-emerald-200 transition"
                  >
                    <Download className="w-3.5 h-3.5" />
                    <span>{t.btnDownloadDoc}</span>
                  </a>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};
