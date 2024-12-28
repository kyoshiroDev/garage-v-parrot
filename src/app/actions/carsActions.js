"use server";
import { PrismaClient } from "@prisma/client";

const prisma = new PrismaClient();

export async function getCars() {
	try {
		const vehicules = await prisma.cars.findMany();
		await prisma.$disconnect();
		return vehicules;
	} catch (e) {
		await prisma.$disconnect();
		console.error(e);
		process.exit(1);
	}
}
