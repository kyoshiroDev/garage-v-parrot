import type { Metadata } from "next";
import { Rajdhani, Prata } from "next/font/google";
import "./globals.css";

const barlow = Rajdhani({
	weight: ["300"],
	subsets: ["latin"],
	variable: "--font-barlow",
});

const prata = Prata({
	weight: ["400"],
	subsets: ["latin"],
	variable: "--font-prata",
});

// Metadata
export const metadata: Metadata = {
	title: "Garage V Parrot",
	description:
		"Avec 15 ans d'expérience, Vincent Parrot a fondé un garage à Toulouse pour offrir un service de réparation automobile de confiance et des voitures d'occasion de qualité. Son équipe qualifiée s'engage à fournir un service personnalisé et transparent pour répondre aux besoins spécifiques de chaque client.",
	keywords: "mots-clés, SEO, Next.js",
};

export default function RootLayout({
	children,
}: Readonly<{
	children: React.ReactNode;
}>) {
	return (
		<html lang='fr'>
			<body
				className={`flex flex-col justify-center items-center min-h-screen`}>
				{children}
			</body>
		</html>
	);
}
