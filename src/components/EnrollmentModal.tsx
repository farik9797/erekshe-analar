import React, { useState, useEffect } from 'react';
import { useAccessibility } from '../context/AccessibilityContext';
import { BRANCHES, SERVICES } from '../data/mockData';
import { X, CheckCircle2, Sparkles, Send, ShieldCheck, Heart } from 'lucide-react';

export const EnrollmentModal: React.FC = () => {
  const {
    lang,
    t,
    isEnrollModalOpen,
    closeEnrollModal,
    preselectedBranch,
    preselectedService
  } = useAccessibility();

  const [parentName, setParentName] = useState('');
  const [phone, setPhone] = useState('');
  const [useWhatsapp, setUseWhatsapp] = useState(true);
  const [childName, setChildName] = useState('');
  const [childAge, setChildAge] = useState('');
  const [preferredBranch, setPreferredBranch] = useState('');
  const [selectedServices, setSelectedServices] = useState<string[]>([]);
  const [diagnosisNotes, setDiagnosisNotes] = useState('');

  const [isSubmitting, setIsSubmitting] = useState(false);
  const [submittedRef, setSubmittedRef] = useState<string | null>(null);

  useEffect(() => {
    if (preselectedBranch) {
      setPreferredBranch(preselectedBranch);
    }
    if (preselectedService && !selectedServices.includes(preselectedService)) {
      setSelectedServices([preselectedService]);
    }
  }, [preselectedBranch, preselectedService]);

  if (!isEnrollModalOpen) return null;

  const toggleService = (serviceId: string) => {
    if (selectedServices.includes(serviceId)) {
      setSelectedServices(selectedServices.filter((s) => s !== serviceId));
    } else {
      setSelectedServices([...selectedServices, serviceId]);
    }
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!parentName || !phone) {
      alert('Пожалуйста, укажите имя и номер телефона.');
      return;
    }

    setIsSubmitting(true);
    setTimeout(() => {
      setIsSubmitting(false);
      const randomRef = `EA-2026-${Math.floor(1000 + Math.random() * 9000)}`;
      setSubmittedRef(randomRef);
    }, 800);
  };

  const handleReset = () => {
    setParentName('');
    setPhone('');
    setChildName('');
    setChildAge('');
    setPreferredBranch('');
    setSelectedServices([]);
    setDiagnosisNotes('');
    setSubmittedRef(null);
    closeEnrollModal();
  };

  return (
    <div className="fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-center justify-center p-3 sm:p-4 animate-fadeIn">
      <div className="bg-white rounded-3xl max-w-2xl w-full max-h-[92vh] overflow-y-auto p-5 sm:p-8 shadow-2xl relative border border-slate-100">
        <button
          onClick={closeEnrollModal}
          className="absolute top-4 right-4 p-2 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 transition"
        >
          <X className="w-5 h-5" />
        </button>

        {submittedRef ? (
          <div className="text-center py-8 flex flex-col items-center gap-4">
            <div className="w-16 h-16 rounded-3xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">
              <CheckCircle2 className="w-10 h-10" />
            </div>
            <h3 className="text-2xl font-extrabold text-slate-900">{t.formSuccessTitle}</h3>
            <p className="text-sm text-slate-600 max-w-md">
              {t.formSuccessDesc} <strong className="text-emerald-700">{submittedRef}</strong>.
            </p>
            <p className="text-xs text-slate-500 max-w-md bg-slate-50 p-4 rounded-2xl border border-slate-100">
              {t.formSuccessNote}
            </p>
            <button
              onClick={handleReset}
              className="mt-4 px-6 py-3 rounded-xl bg-emerald-600 text-white font-bold text-xs hover:bg-emerald-700 transition"
            >
              {t.btnClose}
            </button>
          </div>
        ) : (
          <form onSubmit={handleSubmit} className="flex flex-col gap-4">
            <div>
              <div className="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-bold mb-2">
                <Sparkles className="w-3.5 h-3.5 text-emerald-600" />
                <span>Запись в центры EREKSHE ANALAR</span>
              </div>
              <h3 className="text-xl sm:text-2xl font-extrabold text-slate-900">{t.formTitle}</h3>
              <p className="text-xs text-slate-500 mt-1">{t.formSubtitle}</p>
            </div>

            {/* Parent Name & Phone */}
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-3">
              <div>
                <label className="text-xs font-bold text-slate-700 block mb-1">
                  {t.formParentName} *
                </label>
                <input
                  type="text"
                  required
                  value={parentName}
                  onChange={(e) => setParentName(e.target.value)}
                  placeholder="ФИО родителя"
                  className="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                />
              </div>

              <div>
                <label className="text-xs font-bold text-slate-700 block mb-1">
                  {t.formPhone} *
                </label>
                <input
                  type="tel"
                  required
                  value={phone}
                  onChange={(e) => setPhone(e.target.value)}
                  placeholder="+7 (700) 000-00-00"
                  className="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                />
              </div>
            </div>

            <div className="flex items-center gap-2">
              <input
                type="checkbox"
                id="whatsapp-check"
                checked={useWhatsapp}
                onChange={(e) => setUseWhatsapp(e.target.checked)}
                className="w-4 h-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500"
              />
              <label htmlFor="whatsapp-check" className="text-xs font-medium text-slate-700 cursor-pointer">
                {t.formWhatsappCheckbox}
              </label>
            </div>

            {/* Child Info */}
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-3">
              <div>
                <label className="text-xs font-bold text-slate-700 block mb-1">
                  {t.formChildName}
                </label>
                <input
                  type="text"
                  value={childName}
                  onChange={(e) => setChildName(e.target.value)}
                  placeholder="Имя ребенка"
                  className="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                />
              </div>

              <div>
                <label className="text-xs font-bold text-slate-700 block mb-1">
                  {t.formChildAge}
                </label>
                <input
                  type="text"
                  value={childAge}
                  onChange={(e) => setChildAge(e.target.value)}
                  placeholder="Например: 5 лет"
                  className="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                />
              </div>
            </div>

            {/* Branch Selector */}
            <div>
              <label className="text-xs font-bold text-slate-700 block mb-1">
                {t.formBranchSelect}
              </label>
              <select
                value={preferredBranch}
                onChange={(e) => setPreferredBranch(e.target.value)}
                className="w-full px-3.5 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500"
              >
                <option value="">{t.formBranchPlaceholder}</option>
                {BRANCHES.map((b) => (
                  <option key={b.id} value={b.id}>
                    {b.name[lang]} ({b.address[lang]})
                  </option>
                ))}
              </select>
            </div>

            {/* Service Checkboxes */}
            <div>
              <label className="text-xs font-bold text-slate-700 block mb-1.5">
                {t.formServicesSelect}
              </label>
              <div className="grid grid-cols-2 sm:grid-cols-3 gap-2 max-h-36 overflow-y-auto p-2 bg-slate-50 rounded-xl border border-slate-200">
                {SERVICES.map((serv) => {
                  const isChecked = selectedServices.includes(serv.id);
                  return (
                    <button
                      key={serv.id}
                      type="button"
                      onClick={() => toggleService(serv.id)}
                      className={`p-2 rounded-lg text-left text-[11px] font-bold transition flex items-center gap-1.5 border ${
                        isChecked
                          ? 'bg-emerald-600 text-white border-emerald-600'
                          : 'bg-white text-slate-700 border-slate-200 hover:bg-slate-100'
                      }`}
                    >
                      <CheckCircle2 className={`w-3.5 h-3.5 ${isChecked ? 'text-white' : 'text-slate-300'}`} />
                      <span className="truncate">{serv.title[lang]}</span>
                    </button>
                  );
                })}
              </div>
            </div>

            {/* Diagnosis notes */}
            <div>
              <label className="text-xs font-bold text-slate-700 block mb-1">
                {t.formDiagnosis}
              </label>
              <textarea
                rows={2}
                value={diagnosisNotes}
                onChange={(e) => setDiagnosisNotes(e.target.value)}
                placeholder="Краткие особенности или диагноз ребенка..."
                className="w-full px-3.5 py-2 rounded-xl bg-slate-50 border border-slate-200 text-xs font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500"
              />
            </div>

            <button
              type="submit"
              disabled={isSubmitting}
              className="mt-2 w-full py-3.5 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-md shadow-emerald-600/20 transition flex items-center justify-center gap-2"
            >
              {isSubmitting ? (
                <span>{t.formSubmitting}</span>
              ) : (
                <>
                  <Send className="w-4 h-4" />
                  <span>{t.formSubmit}</span>
                </>
              )}
            </button>
          </form>
        )}
      </div>
    </div>
  );
};
