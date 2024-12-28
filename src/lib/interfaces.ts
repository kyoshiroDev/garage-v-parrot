export interface NosPrestationsInterface {
	id: number;
	prestation: string;
	image: string;
}

export interface PrestationsInterface {
	title: string;
	textSup: string;
	imageSrc: string;
	imageAlt: string;
	textInf: string;
}

export interface MenuInterface {
	id: number;
	name: string;
	href: string;
}

export interface AvisClientInterface {
	id: number;
	name: string;
	note: number;
	content: string;
}

export interface VehiculeInterface {
  id: number;
	image: string;
	marque: string;
	model: string;
	kilometrage: number;
	portes: number;
	puissance: number;
	date: number;
	energie: string;
	prix: number;
}

