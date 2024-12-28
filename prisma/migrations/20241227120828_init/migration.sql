-- CreateTable
CREATE TABLE "Cars" (
    "id" SERIAL NOT NULL,
    "image" TEXT NOT NULL,
    "marque" TEXT NOT NULL,
    "model" TEXT NOT NULL,
    "kilometrage" INTEGER NOT NULL,
    "portes" INTEGER NOT NULL,
    "puissance" INTEGER NOT NULL,
    "date" TEXT NOT NULL,
    "energie" TEXT NOT NULL,
    "prix" INTEGER NOT NULL,

    CONSTRAINT "Cars_pkey" PRIMARY KEY ("id")
);
