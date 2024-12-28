import Prestations from "@/components/Prestations";
import { PrestationsInterface } from "@/lib/interfaces";

export default function Carroserie() {
	const peinture: PrestationsInterface = {
		title: "Peinture",
		textSup:
			"Plongez dans l'univers de la perfection automobile avec notre service de peinture de carrosserie. Nos artisans passionnés redonnent vie à votre voiture en utilisant des techniques de peinture de pointe. Chaque nuance est méticuleusement choisie pour s'harmoniser avec votre style, assurant une finition éclatante et durable. Optez pour une transformation visuelle spectaculaire qui transcende les simples coups de pinceau, et offrez à votre véhicule une allure aussi exceptionnelle que vous. Rendez-vous sur notre site et explorez l'art de la peinture automobile pour une expérience unique.",
		imageSrc: "/reparation-carrosserie/peinture-voiture.jpg",
		imageAlt: "peinture sur un véhicule",
		textInf:
			"Dans notre atelier, la peinture de carrosserie est bien plus qu'une simple application de couleurs. Chaque couche est appliquée avec expertise, créant une surface lisse et résistante aux éléments. Notre palette de teintes de qualité supérieure offre non seulement une esthétique remarquable, mais également une protection durable contre l'usure. Confiez-nous votre voiture, et laissez notre équipe dédiée transcender vos attentes, offrant à votre véhicule une allure qui se distingue sur la route. Découvrez comment notre art de la peinture redéfinit la beauté automobile sur notre site dès aujourd'hui.",
	};
	const debosselage: PrestationsInterface = {
		title: "Débosselage",
		textSup:
			"Découvrez l'art du débosselage sur notre site, où la perfection rencontre la carrosserie. Notre équipe qualifiée redonne vie à votre voiture en éliminant chaque bosse avec précision, préservant ainsi l'esthétique d'origine. Grâce à notre technique de débosselage sans peinture, votre véhicule retrouve son éclat sans compromettre la finition d'usine. Offrez-lui une seconde jeunesse avec notre service expert de débosselage, alliant savoir-faire artisanal et technologie de pointe. Redécouvrez la beauté de votre voiture, sans trace de chaque enfoncement, grâce à notre expertise inégalée.",
		imageSrc: "/reparation-carrosserie/debosselage.jpeg",
		imageAlt: "peinture sur un véhicule",
		textInf:
			"Notre engagement envers la perfection se poursuit avec des résultats qui dépassent vos attentes. Chaque détail compte dans notre approche du débosselage, car nous comprenons l'importance de préserver l'intégrité de votre véhicule. En choisissant notre service, vous optez pour une réparation sans faille, une rénovation qui laisse votre carrosserie impeccable. Profitez d'une conduite en toute élégance, libérée de tout impact visuel, grâce à notre expertise dévouée. Confiez-nous votre voiture, et redécouvrez le plaisir de rouler dans un véhicule à l'apparence irréprochable.",
	};
	return (
		<div className='flex flex-col justify-arround items-center gap-20 mt-10'>
			<h1 className='text-4xl text-center text-garage-red font-semibold'>
				Réparation carrosserie
			</h1>
			<Prestations
				title={peinture.title}
				textSup={peinture.textSup}
				imageSrc={peinture.imageSrc}
				imageAlt={peinture.imageAlt}
				textInf={peinture.textInf}
			/>
			<Prestations
				title={debosselage.title}
				textSup={debosselage.textSup}
				imageSrc={debosselage.imageSrc}
				imageAlt={debosselage.imageAlt}
				textInf={debosselage.textInf}
			/>
		</div>
	);
}
