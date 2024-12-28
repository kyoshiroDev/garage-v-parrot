"use server";
import { PrismaClient } from "@prisma/client";

const prisma = new PrismaClient();

export async function  getCars(){
		return await prisma.cars.findMany();
}
