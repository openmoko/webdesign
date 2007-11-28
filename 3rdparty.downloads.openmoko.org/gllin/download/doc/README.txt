This is the OpenMoko GLLIN package. It contains an utility that converts the
output of the Broadcom (formerly Global Locate) Hammerhead GPS chip in the
FIC Neo1973 into NMEA data. You can process the output with any GPS
utility that is able to read NMEA data from the pipe /tmp/nmeaP.

For convenience, we provide a GLLIN wrapper script (/home/root/gllin/gllin)
that creates /tmp/nmeaP and starts the real GLLIN executable with
the proper parameters. GLLIN will automatically turn on the GPS device
in your Neo1973 on startup, however it will not turn it off on shutdown --
you will need to do this manually to reduce energy consumption.

Note: This package includes parts of the following 3rd party components
 * The GNU C Library 2.5, licensed under LGPL -- see lgpl-2.1.txt
 * Udev 0.92, licensed under GPL -- see gpl-2.0.txt
 * libelf 0.8.6, licensed under LGPL, see lgpl-2.1.txt
 * GNU C Compiler 4.1.1, licensed under GPL, see gpl-2.0.txt
  
You can obtain the source code of these components from
 * http://downloads.openmoko.org/sources/
