import Footer from "@/components/Footer";
import Navbar from "@/components/Navbar";

export default function MainLayout({
	children,
}: Readonly<{
	children: React.ReactNode;
}>) {
	return (
		<>
			{/* Navbar */}
			<Navbar />
			{/* Content */}
			<main className='flex-1 flex-col w-full items-center justify-center m-auto py-7 px-3'>
				{children}
			</main>
			{/* Footer */}
			<Footer />
		</>
	);
}
