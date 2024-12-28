"use client";

import Image from "next/image";
import Button from "@/components/Button";
import Link from "next/link";
import { MenuInterface } from "@/lib/interfaces";
import { useState } from "react";

export default function Navbar() {
	// Variables
	const menu: MenuInterface[] = [
		{ id: 1, name: "Accueil", href: "/" },
		{ id: 2, name: "Mécanique", href: "/pages/mecanique" },
		{ id: 3, name: "Carrosserie", href: "/pages/carrosserie" },
		{ id: 4, name: "Occasions", href: "/pages/occasions" },
	];

	// States
	const [isOPen, setIsOpen] = useState<boolean>(false);

	return (
		<header className='flex items-center justify-between max-h-[100px] w-full border-b border-black'>
			<Image
				src='/Header/Logo.png'
				alt='logo de la société'
				width={250}
				height={250}
				priority={true}
				className='aspect-auto object-fill'
			/>
			<nav
				className={`nav-bar-mobile ${
					!isOPen
						? "min-h-0 mt-[-300px] transition-all ease-in-out duration-700"
						: "min-h-full mt-0 transition-all ease-in-out duration-700 "
				}`}>
				{menu.map((menu) => (
					<Link
						key={menu.id}
						href={menu.href}
						className='hover:text-garage-red hover:text-xl duration-300 h-full lg:h-min lg:gap-10'
						onClick={() => setIsOpen(!isOPen)}>
						{menu.name}
					</Link>
				))}
			</nav>
			<div className='w-[150px] lg:hidden justify-around items-center flex'>
				<Image
					src={"/Header/login.svg"}
					alt='image de connection'
					width={50}
					height={50}
					className='aspect-square'
				/>
				<Image
					src={!isOPen ? "/Header/menu-burger.svg" : "/Header/x-lg.svg"}
					alt='menu burger'
					width={50}
					height={50}
					className='aspect-square z-[1]'
					onClick={() => setIsOpen(!isOPen)}
				/>
			</div>
			<div className='w-[250px] lg:flex justify-center items-center hidden'>
				<Button>Connexion</Button>
			</div>
		</header>
	);
}
