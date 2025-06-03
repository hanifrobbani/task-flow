import MainLayout from "@/components/section/main"

export default function Layout({ children }: { children: React.ReactNode }) {
  return (
    <MainLayout> {children} </MainLayout>
  );
}