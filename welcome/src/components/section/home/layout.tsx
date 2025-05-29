import HeroSection from "./components/hero-section";
import SponsoredSection from "./components/sponsored-section";
import FeatureSection from "./components/feature-section";
import NewsLatterSection from "./components/newslatter-section";

export default function HomeLayout() {
  return (
      <div className="space-y-20">
        <HeroSection />

        <SponsoredSection />
        <div className="bg-slate-100">
        <FeatureSection />
        </div>
        <NewsLatterSection />
      </div>
  );
}
